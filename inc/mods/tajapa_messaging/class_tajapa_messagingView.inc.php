<?
class tajapa_messaging_view extends modView 
{
	var $mod_name = 'tajapa_messaging';
	/**
	*	view method distribution
	*/
	function main($vid, $method_name) 
	{
		$this->vid = $vid;
		$this->OPC->lnk_add('vid',$this->vid);
		switch(strtolower($method_name)) 
		{
			case 'compose':					$this->compose();				break;
			case 'sent':					$this->sent();					break;
			case 'inbox':			
			default:						$this->inbox();					break;
		}
	}

	/**
	*	show the compose form
	*/
	function compose()
	{
		$this->set_var('nav',$this->nav('compose'));
		$f = new FORMS('compose');
		$f->button('compose',e::o('send'));
		$f->set_values($this->data);
		$this->set_var('compose',$f->show());
		$this->show('compose');
	}

	/**
	*	show the sent box
	*/
	function sent() 
	{
		$this->set_var('nav',$this->nav('sent')); 
		// get all messages i have ever sent
		$m = $this->DB->query("SELECT * FROM tajapa_message WHERE uid_from = ".$this->CLIENT->usr['id']);
		$this->set_var("messages",$m);
		$this->show('sent'); 
	}

	/**
	*	show the inbox
	*/
	function inbox()
	{
		$this->set_var('nav',$this->nav('inbox'));
		$m = $this->DB->query("SELECT * FROM tajapa_message WHERE uid_to = ".$this->CLIENT->usr['id']);
		$this->set_var("messages",$m);
		$this->show('inbox');
	}

	function nav($type='inbox')
	{
		$s = '
		<ul class="nav nav-tabs">
			<li '.($type=='inbox'?'class="active"':'').'>
				<a href="'.$this->OPC->lnk(array('mod'=>'tajapa_messaging','event'=>'inbox')).'">'.e::o('inbox').'</a>
			</li>
			<li '.($type=='sent'?'class="active"':'').'>
				<a href="'.$this->OPC->lnk(array('mod'=>'tajapa_messaging','event'=>'sent')).'">'.e::o('sent').'</a>
			</li>
			<li '.($type=='compose'?'class="active"':'').'>
				<a href="'.$this->OPC->lnk(array('mod'=>'tajapa_messaging','event'=>'compose','data[init]'=>true)).'">'.e::o('compose').'</a>
			</li>
		</ul>
		';
		return $s;
	}

}
?>
