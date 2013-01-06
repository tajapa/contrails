<?
class tajapa_user_view extends modView 
{
	var $mod_name = 'tajapa_user';
	/**
	*	view method distribution
	*/
	function main($vid, $method_name) 
	{
		$this->vid = $vid;
		$this->OPC->lnk_add('vid',$vid);
		
		switch(strtolower($method_name)) 
		{
			
			case 'welcome':					$this->welcome();						break;
			case 'register':				
			default:						$this->register();						break;
		}
	}
	/**
	*	start here to learn how to work with contrails
	*/
	function register()
	{
		// registration form
		// only needs user/email/password
		$f = new FORMS('register');
		$f->button('register',e::o('start'));
		$this->set_var('form',$f->show());
		$this->show('register');
	}

	function welcome()
	{
		$this->show('welcome');	
	}

}
?>
