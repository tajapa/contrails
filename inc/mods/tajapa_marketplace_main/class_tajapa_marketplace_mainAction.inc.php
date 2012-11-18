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
			case 'market_find':						return $this->market_find();								break;
			default:								$this->set_view(strtolower($action['event']));				break;
		}		
	}

	function market_find()
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
		return $this->MOF->obtain('tajapa_marketplace',$r->f('id'));
	}

}
?>
