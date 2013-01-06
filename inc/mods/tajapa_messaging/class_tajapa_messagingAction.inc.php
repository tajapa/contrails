<?
class tajapa_messaging_action extends modAction 
{
	var $mod_name = 'tajapa_messaging';
	/**
	*	event distribution
	*/
	function main($action, $p = null)
	{
		switch(strtolower($action['event'])) 
		{
			case 'lnk':				return $this->lnk($p);					break;
			case 'inbox':			$this->inbox();							break;
			case 'sent':			$this->sent();							break;
			case 'compose':			$this->compose();						break;
		}		
	}

	/**
	*	compose
	*/
	function compose()
	{
		if(isset($this->data['init']))
		{
			return $this->set_view('compose');
		}

		$market = tajapa_helper::market_find();
		if($market === false)
		{
			return $this->OPC->error(e::o('no_market_found'));	
		}

		$this->set_view('compose');
		$f = new forms('compose');
		if(!$f->valid())
		{
			return $this->OPC->error(e::o('compose_form_error'));
		}
		// now identify the receiving user
		$uid_to = $this->MC->call('usradmin','usr_exists',array('usr'=>$this->data['to']));
		if($uid_to == false)
		{
			return $this->OPC->error(e::o('no_such_user_error'));
		}

		$m = $this->MOF->obtain('tajapa_message');

		$m->uid_to($uid_to);
		$m->uid_from($this->CLIENT->usr['id']);
		$m->usr_to($this->data['to']);
		$m->usr_from($this->CLIENT->usr['usr']);
		$m->subject($this->data['subject']);
		$m->body($this->data['body']);
		$m->created(time());
		$m->tajapa_marketplace($market->id());
		$m->tajapa_offer((isset($this->data['tajapa_offer'])?$this->data['tajapa_offer']:0));
		$m->tajapa_request((isset($this->data['tajapa_request'])?$this->data['tajapa_request']:0));
		$m->read(0);
		$this->MOF->register($m);

		$this->OPC->success(e::o('compose_success'));
		$this->set_view('sent');
	}

	/**
	*	sent
	*/
	function sent()
	{
		$this->set_view('sent');
	}

	/**
	*	inbox
	*/
	function inbox()
	{
		$this->set_view('inbox');
	}

	function lnk($p)
	{
		if($p['subject'] != null)
		{
			return $this->OPC->lnk(array(
				'mod' => 'tajapa_messaging',
				'event' => 'compose',
				'data[init]' => true,
				'data[to]' => $p['to'],
				'data[subject]' => $p['subject'],
				'pid' => 9,
				'vid' => 'messaging',
				));
		}
		return $this->OPC->lnk(array(
			'mod' => 'tajapa_messaging',
			'event' => 'compose',
			'data[init]' => true,
			'data[to]' => $p['to'],
			'pid' => 9,
			'vid' => 'messaging',
			));
	}

}
?>
