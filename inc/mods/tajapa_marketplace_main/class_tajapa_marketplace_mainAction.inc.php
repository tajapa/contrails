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
			case 'request_save':					$this->request_save();										break;
			case 'market_find':						return $this->market_find();								break;
			default:								$this->set_view(strtolower($action['event']));				break;
		}		
	}

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
		$this->data['open'] = 1;
		if($this->form('tajapa_request'))
		{
			return $this->set_view('open');
		}
		return $this->set_view('request');
	}

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
		if($level == 0)
		{
			$r = $this->CRUD->load_range('tajapa_request','*',array('tajapa_marketplace'=>$m->id()),false);
			if($r->nr() == 0)
			{
				$this->OPC->information(e::o('no_requests_found'));
			}
		}
		return $m;
	}

}
?>
