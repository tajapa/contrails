<?
class tajapa_marketplace_main_action extends modAction 
{
	var $mod_name = 'tajapa_marketplace_main';
	/**
	*	event distribution
	*/
	function main($action, $p = null)
	{
		switch(strtolower($action['event'])) 
		{
			case 'offer_fulfilled':					$this->offer_fulfilled();									break;
			case 'offer_book':						$this->offer_book();										break;
			case 'quote_place':						$this->quote_place();										break;
			case 'request_save':					$this->request_save();										break;
			case 'market_find':						return $this->market_find();								break;
			default:								$this->set_view(strtolower($action['event']));				break;
		}		
	}



	/**
	*	fulfill the offer
	*	balance the accounts!
	*/
	function offer_fulfilled()
	{
		$offer = $this->MOF->obtain('tajapa_offer',$this->data['offer']);
		$request = $this->MOF->obtain('tajapa_request',$offer->tajapa_request());
		$offer->fulfilled(1);
		$request->status(3);
		// now fulfill the transaction between the accounts
		$t = $this->MOF->obtain('tajapa_transaction');		
		$t->uid_from($request->uid());
		$t->uid_to($offer->uid());
		$t->amount($offer->amount());
		$t->tajapa_offer($offer->id());
		$t->tajapa_request($request->id());
		$t->tajapa_marketplace($request->tajapa_marketplace());
		$t->created(time());
		$this->MOF->register($t);
		// add the ranking
		$r = $this->MOF->obtain('tajapa_rank');		
		$r->uid_from($request->uid());
		$r->uid_to($offer->uid());
		$r->stars($this->data['stars']);
		$r->tajapa_offer($offer->id());
		$r->tajapa_request($request->id());
		$r->tajapa_marketplace($request->tajapa_marketplace());
		$r->created(time());
		$this->MOF->register($r);
		//
		$this->OPC->success(e::o('offer_fulfilled_success'));
	}

	/**
	*	book a specific offer and close the request
	*/
	function offer_book()
	{
		$offer = $this->MOF->obtain('tajapa_offer',$this->data['offer']);
		$request = $this->MOF->obtain('tajapa_request',$offer->tajapa_request());
		$offer->chosen(1);
		$request->status(2);
		$this->OPC->success(e::o('offer_book_success'));
	}

	/**
	*	place a quote
	*	validate against the balance of the current user
	*	place it
	*/
	function quote_place()
	{
		$this->set_view('open');
		// make sure the user is registered
		if($this->CLIENT->usr['is_default'])
		{
			return $this->OPC->error('quote_place_login');
		}
		// and make sure the user is accountable
		$request = $this->MOF->obtain('tajapa_request',$this->data['tajapa_request']);
		$this->data['uid'] = $this->CLIENT->usr['id'];
		$this->data['created'] = time();
		$this->data['chosen'] = 0;
		$this->data['fulfilled'] = 0;
		$this->data['tajapa_marketplace'] = $request->tajapa_marketplace();
		// freeze the amount for the user until the request is closed
		$this->form('tajapa_offer');
	}

	/**
	*	create a new request
	*/
	function request_save()
	{
		$m = $this->market_find(1);
		if($m === false)
		{
			return;
		}
		$this->data['uid'] = $this->CLIENT->usr['id'];
		$this->data['created'] = time();
		$this->data['tajapa_marketplace'] = $m->id();
		$this->data['status'] = 1;
		$this->data['expires'] = time() + ($this->data['expires'] * 86400);

		if($this->form('tajapa_request'))
		{
			return $this->set_view('open');
		}
		return $this->set_view('request');
	}

	/**
	* find a market
	*/
	function market_find($level=0)
	{
		// get the marketplace from the url
		$market = tajapa_helper::marketfromurl();
		if($market === false)
		{
			$this->OPC->error(e::o('no_market_found'));
			return false;
		}
		// get the id
		$r = $this->CRUD->load('tajapa_marketplace','url',$market);
		if($r->nr() != 1 || !is_object($r))
		{
			$this->OPC->error(e::o('no_market_found'));
			return false;
		}		
		$m = $this->MOF->obtain('tajapa_marketplace',$r->f('id'));
		/*
		if($level == 0)
		{
			$r = $this->CRUD->load_range('tajapa_request','*',array('tajapa_marketplace'=>$m->id()),false);
			if($r->nr() == 0)
			{
				//$this->OPC->information(e::o('no_requests_found'));
			}
		}
		*/
		return $m;
	}

}
?>
