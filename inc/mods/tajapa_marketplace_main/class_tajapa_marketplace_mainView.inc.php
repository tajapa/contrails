<?
class tajapa_marketplace_main_view extends modView 
{
	var $mod_name = 'tajapa_marketplace_main';
	/**
	*	view method distribution
	*/
	function main($vid, $method_name) 
	{
		$this->vid = $vid;
		$this->OPC->lnk_add('vid',$vid);
		
		switch(strtolower($method_name)) 
		{
			case 'my_transactions':			$this->my_transactions();							break;
			case 'my_offers':				$this->my_offers();									break;
			case 'my_requests':				$this->my_requests();								break;
			case 'request':					$this->request();									break;
			case 'open':					$this->open();										break;
			case 'find':					$this->find();										break;
		}
	}

	/**
	*	my transactions
	*/
	function my_transactions()
	{
		if(false === ($m = $this->MC->call('tajapa_marketplace_main','market_find')))
		{
			return $this->find();
		}
		$r = $this->DB->query("SELECT * FROM tajapa_transaction WHERE uid_from = ".$this->CLIENT->usr['id']." OR uid_to = ".$this->CLIENT->usr['id']." ORDER BY id DESC");
		$this->set_var('data',$r);
		$this->show('my_transactions');
		if($r->nr() == 0)
		{
			$this->set_var('information',e::o('no_transactions_found'));
			$this->show('empty');
		}
	}


	/**
	*	show the open and pending offers
	*/
	function my_offers()
	{
		if(false === ($m = $this->MC->call('tajapa_marketplace_main','market_find')))
		{
			return $this->find();
		}
		// get all offers for this marketplace that are 
		// - chosen and not fulfilled
		// - open and the request is still active
		$r = $this->DB->query("SELECT OFFER.tajapa_request FROM tajapa_offer AS OFFER, tajapa_request AS REQUEST where (OFFER.uid = ".$this->CLIENT->usr['id']." AND OFFER.tajapa_marketplace = ".$m->id()." AND OFFER.fulfilled != 1) AND (REQUEST.id = OFFER.tajapa_request AND REQUEST.status < 3 AND  REQUEST.expires > ".time().") ");
		if($r->nr() == 0)
		{
			$this->show('my_offers');
			$this->set_var('information',e::o('no_offers_found'));
			$this->show('empty');
			return;
		}
		// show this as a list of requests
		while($r->next())
		{
			$id[] = $r->f('tajapa_request');
		}

		$requests = $this->DB->query("SELECT * FROM tajapa_request WHERE id in (".implode(",",$id).")");
		// get the additional data for the requests
		while($requests->next())
		{
			$offers = $this->DB->query("SELECT * FROM tajapa_offer where tajapa_request = ".$requests->f('id')." AND uid = ".$this->CLIENT->usr['id']);
			$data[] = array
			(
				'request' => $requests->r(),
				'offers' => $offers->get(),
			);
		}
		$this->set_var('data',$data);
		$this->show('my_offers');

	}

	/**
	*	show my requests and allow actions on the requests
	*/
	function my_requests()
	{
		if(false === ($m = $this->MC->call('tajapa_marketplace_main','market_find')))
		{
			return $this->find();
		}
		$requests = $this->CRUD->load_range('tajapa_request','*',array('tajapa_marketplace'=>$m->id(),'uid'=>$this->CLIENT->usr['id']));
		// get the additional data for the requests
		while($requests->next())
		{
			$offers = $this->DB->query("SELECT * FROM tajapa_offer where tajapa_request = ".$requests->f('id'));
			$data[] = array
			(
				'request' => $requests->r(),
				'offers' => $offers->get(),
			);
		}
		$this->set_var('data',$data);
		$this->show('my_requests');
		if($requests->nr() == 0)
		{
			$this->set_var('information',e::o('no_requests_found'));
			$this->show('empty');
		}
	}

	/**
	*	show a market
	*	in the first version, we only offer to add requests and offers to those
	*	in a second version we allow to add standing offers
	*/
	function open()
	{
		if(false === ($m = $this->MC->call('tajapa_marketplace_main','market_find')))
		{
			return $this->find();
		}
		//$r = $this->CRUD->load_range('tajapa_request','*',array('tajapa_marketplace'=>$m->id()));
		$r = $this->DB->query("SELECT * FROM tajapa_request WHERE tajapa_marketplace = ".$m->id()." and status = 1 and expires > ".time());
		if($r->nr() == 0)
		{
			$this->show('open');
			$this->set_var('information',e::o('no_requests_found'));
			$this->show('empty');
			return;
		}
		while($r->next())
		{
			$c = $this->DB->query("SELECT count(id) FROM tajapa_offer WHERE tajapa_request = ".$r->f('id'));
			$count[$r->f('id')] = $c->f('count(id)');
		}
		$r->reset();
		$quote = $this->form('tajapa_offer',null,array('uid','created','tajapa_request','chosen','fulfilled','tajapa_marketplace'),array('amount'=>array('width'=>'50')));
		$quote->button('quote_place',e::o('quote_place'));
		$this->set_var('quote',$quote);
		$this->set_var('list',$r);
		$this->set_var('count',$count);
		$this->show('open');
	}

	function request()
	{
		$f = $this->form('tajapa_request',null,array('uid','created','tajapa_marketplace','status'));
		$f->button('request_save',e::o('save'));
		$f->button('open',e::o('cancel'));
		$this->set_var('form',$f->show());
		$this->show('request');
	}

	/**
	*	find a market 
	*/
	function find()
	{
		$this->set_var('list',$this->CRUD->load_range('tajapa_marketplace','*',array('active'=>1)));
		$this->show('find');
	}

}
?>
