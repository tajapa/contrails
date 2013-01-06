<?
class generated_tajapa_rank extends model
{

	protected function _keys()
	{
		return array('0' => array('type' => 'PRIMARY KEY','fields' => array('0' => 'id',),),);
	}

	protected function _fields()
	{
		return array('id' => array('Field' => 'id','Type' => 'int(11) unsigned','Null' => 'NO','Key' => 'PRI','Default' => NULL,'Extra' => 'auto_increment',),'uid_to' => array('Field' => 'uid_to','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'uid_from' => array('Field' => 'uid_from','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'stars' => array('Field' => 'stars','Type' => 'int(2)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'tajapa_offer' => array('Field' => 'tajapa_offer','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'tajapa_marketplace' => array('Field' => 'tajapa_marketplace','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'tajapa_request' => array('Field' => 'tajapa_request','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'created' => array('Field' => 'created','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),);
	}

	public function table_name()
	{
		return 'tajapa_rank';
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

	public function stars($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',2))
			{
				return false;
			}
			$this->push_update(array('stars'=>$d));
			$this->_fields['stars'] = $d;
			return true;
		}
		return $this->_fields['stars'];
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
}
?>