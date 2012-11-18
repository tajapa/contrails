<?
class tajapa_navigation_action extends modAction 
{
	var $mod_name = 'tajapa_navigation';
	/**
	*	event distribution
	*/
	function main($action, $p = null)
	{
		switch(strtolower($action['event'])) 
		{
			case 'tajapa_navigation':			$this->tajapa_navigation();							break;
		}		
	}
	/**
	*	sample event
	*/
	function tajapa_navigation()
	{
		//MC::debug($this->data,'the data');
		$this->set_view('tajapa_navigation');
		$f = new forms('tajapa_navigation');
		if(!$f->valid())
		{
			return $this->OPC->error(e::o('tajapa_navigation_form_error'));
		}
		// write the data 
		return;
	}
}
?>
