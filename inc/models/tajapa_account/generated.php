<?
class generated_tajapa_account extends model
{

	protected function _keys()
	{
		return array('0' => array('type' => 'PRIMARY KEY','fields' => array('0' => 'id',),),);
	}

	protected function _fields()
	{
		return array('id' => array('Field' => 'id','Type' => 'int(11) unsigned','Null' => 'NO','Key' => 'PRI','Default' => NULL,'Extra' => 'auto_increment',),'uid' => array('Field' => 'uid','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'tajapa_marketplace' => array('Field' => 'tajapa_marketplace','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'balance' => array('Field' => 'balance','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'frozen' => array('Field' => 'frozen','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),);
	}

	public function table_name()
	{
		return 'tajapa_account';
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

	public function uid($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('uid'=>$d));
			$this->_fields['uid'] = $d;
			return true;
		}
		return $this->_fields['uid'];
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

	public function balance($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('balance'=>$d));
			$this->_fields['balance'] = $d;
			return true;
		}
		return $this->_fields['balance'];
	}

	public function frozen($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->push_update(array('frozen'=>$d));
			$this->_fields['frozen'] = $d;
			return true;
		}
		return $this->_fields['frozen'];
	}
}
?>