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
			case 'open':					$this->open();										break;
			case 'find':					$this->find();										break;
		}
	}
	/**
	*	show a market
	*/
	function open()
	{
		if(false === ($m = $this->MC->call('tajapa_marketplace_main','market_find')))
		{
			return $this->find();
		}
		// show tabs to switch between requests and offers
		
		// show a button to open the respective
		// show a list of the respective

		
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
