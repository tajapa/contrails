<?
class generated_tajapa_message extends model
{

	protected function _keys()
	{
		return array('0' => array('type' => 'PRIMARY KEY','fields' => array('0' => 'id',),),);
	}

	protected function _fields()
	{
		return array('id' => array('Field' => 'id','Type' => 'int(11) unsigned','Null' => 'NO','Key' => 'PRI','Default' => NULL,'Extra' => 'auto_increment',),'uid_from' => array('Field' => 'uid_from','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'uid_to' => array('Field' => 'uid_to','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'usr_from' => array('Field' => 'usr_from','Type' => 'varchar(255)','Null' => 'NO','Key' => '','Default' => '','Extra' => '',),'usr_to' => array('Field' => 'usr_to','Type' => 'varchar(255)','Null' => 'NO','Key' => '','Default' => '','Extra' => '',),'subject' => array('Field' => 'subject','Type' => 'varchar(255)','Null' => 'NO','Key' => '','Default' => '','Extra' => '',),'body' => array('Field' => 'body','Type' => 'text','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'tajapa_offer' => array('Field' => 'tajapa_offer','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'tajapa_request' => array('Field' => 'tajapa_request','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'tajapa_marketplace' => array('Field' => 'tajapa_marketplace','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'created' => array('Field' => 'created','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'read' => array('Field' => 'read','Type' => 'tinyint(1)','Null' => 'NO','Key' => '','Default' => '0','Extra' => '',),);
	}

	public function table_name()
	{
		return 'tajapa_message';
	}


	public function id($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('id'=>$d));
			$this->_fields['id'] = $d;
			return true;
		}
		return $this->_fields['id'];
	}

	public function uid_from($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('uid_from'=>$d));
			$this->_fields['uid_from'] = $d;
			return true;
		}
		return $this->_fields['uid_from'];
	}

	public function uid_to($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('uid_to'=>$d));
			$this->_fields['uid_to'] = $d;
			return true;
		}
		return $this->_fields['uid_to'];
	}

	public function usr_from($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'varchar',255))
			{
				return false;
			}
			$this->push_update(array('usr_from'=>$d));
			$this->_fields['usr_from'] = $d;
			return true;
		}
		return $this->_fields['usr_from'];
	}

	public function usr_to($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'varchar',255))
			{
				return false;
			}
			$this->push_update(array('usr_to'=>$d));
			$this->_fields['usr_to'] = $d;
			return true;
		}
		return $this->_fields['usr_to'];
	}

	public function subject($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'varchar',255))
			{
				return false;
			}
			$this->push_update(array('subject'=>$d));
			$this->_fields['subject'] = $d;
			return true;
		}
		return $this->_fields['subject'];
	}

	public function body($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'text'))
			{
				return false;
			}
			$this->push_update(array('body'=>$d));
			$this->_fields['body'] = $d;
			return true;
		}
		return $this->_fields['body'];
	}

	public function tajapa_offer($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('tajapa_offer'=>$d));
			$this->_fields['tajapa_offer'] = $d;
			return true;
		}
		return $this->_fields['tajapa_offer'];
	}

	public function tajapa_request($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('tajapa_request'=>$d));
			$this->_fields['tajapa_request'] = $d;
			return true;
		}
		return $this->_fields['tajapa_request'];
	}

	public function tajapa_marketplace($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('tajapa_marketplace'=>$d));
			$this->_fields['tajapa_marketplace'] = $d;
			return true;
		}
		return $this->_fields['tajapa_marketplace'];
	}

	public function created($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('created'=>$d));
			$this->_fields['created'] = $d;
			return true;
		}
		return $this->_fields['created'];
	}

	public function read($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'tinyint',1))
			{
				return false;
			}
			$this->push_update(array('read'=>$d));
			$this->_fields['read'] = $d;
			return true;
		}
		return $this->_fields['read'];
	}
}
?>