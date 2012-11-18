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
			case 'request':					$this->request();									break;
			case 'open':					$this->open();										break;
			case 'find':					$this->find();										break;
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
		$r = $this->CRUD->load_range('tajapa_request','*',array('tajapa_marketplace'=>$m->id()));
		if($r->nr() == 0)
		{
			return $this->request();
		}
		$this->set_var('list',$this->CRUD->load_range('tajapa_request','*',array('open'=>1)));
		$this->show('open');
	}

	function request()
	{
		$f = $this->form('tajapa_request',null,array('uid','created','tajapa_marketplace','open'));
		$f->button('request_save',e::o('save'));
		$f->button('open',e::o('cancel'));
		$this->set_var('form',$f->show());
		$this->show('request');
	}

	function offer()
	{
		
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
