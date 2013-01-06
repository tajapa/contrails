<?
class tajapa_user_action extends modAction 
{
	var $mod_name = 'tajapa_user';
	/**
	*	event distribution
	*/
	function main($action, $p = null)
	{
		switch(strtolower($action['event'])) 
		{
			case 'register':			$this->register();							break;
		}		
	}
	/**
	*	sample event
	*/
	function register()
	{
		$f = new forms('register');
		if(!$f->valid())
		{
			$this->set_view('register');
			return $this->OPC->error(e::o('register_form_error'));
		}
		// create a new user
		$this->set_view('welcome');
		$this->MC->call('usradmin','usr_create',array
		(
			'info' => array
			(
				'usr' => $this->data['usr'],
				'pwd' => $this->data['pwd'],
				'email' => $this->data['email'],
			),
			'grp' => array
			(
				68,66
			),
			'login' => true,
		));
		return;
	}
}
?>
