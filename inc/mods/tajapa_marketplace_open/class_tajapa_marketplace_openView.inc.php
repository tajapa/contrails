<?
class tajapa_marketplace_open_view extends modView 
{
	var $mod_name = 'tajapa_marketplace_open';
	/**
	*	view method distribution
	*/
	function main($vid, $method_name) 
	{
		$this->vid = $vid;
		$this->OPC->lnk_add('vid',$vid);

		switch(strtolower($method_name)) 
		{
			case 'step2':					$this->step2();					break;
			case 'step1':					$this->step1();					break;
			case 'step0':					$this->step0();					break;
			default:						$this->step0();					break;
		}
	}

	/**
	*	choose the currency
	*/
	function step2()
	{
		$r = $this->CRUD->load_range('tajapa_currency','*',array('template'=>1));
		$this->set_var('list',$r);
		$this->show('step2');
	}

	/**
	*	start here to learn how to work with contrails
	*/
	function step1()
	{

		$f = $this->form('tajapa_marketplace');
		$f->button('step1','Save');
		$this->set_var('form',$f->show());
		$this->show('step1');
	}
	
	/**
	*	create the user
	*/
	function step0()
	{
		$f = new FORMS('step0');
		$f->button('step0',e::o('start'));
		$this->set_var('form',$f->show());
		$this->show('step0');
	}
}
?>