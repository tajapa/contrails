<?
class test_view extends modView 
{
	var $mod_name = 'test';
	/**
	*	view method distribution
	*/
	function main($vid, $method_name) 
	{
		$this->vid = $vid;
		switch(strtolower($method_name)) 
		{
			case 'test':			
			default:						$this->test();					break;
		}
	}
	/**
	*	start here to learn how to work with contrails
	*/
	function test()
	{

		$m = MF::singleton();
		$b = $m->obtain('sys_burc','p108071938_348');
		if(!$b->pid(500)){
			MC::log("Failed to update");
		}

		$c = $m->obtain('test_table', null, array('field2' => 23, 'field1' => 'Something or another'));

		$b->permanent(1);

//		$b->save();

		//$b = new sys_burc();

		//$b->load('p108071938_348');

		MC::debug($c);

		return;

		if($this->access('test'))
		{
			$this->set_var('link',$this->lnk(array('event' => 'test')));
		}
		$f = new forms('test');
		$this->set_var('form',$f->show());
		$this->show('test');
	}
}
?>
