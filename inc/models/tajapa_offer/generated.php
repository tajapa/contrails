<?
class generated_tajapa_offer extends model
{

	protected function _keys()
	{
		return array('0' => array('type' => 'PRIMARY KEY','fields' => array('0' => 'id',),),);
	}

	protected function _fields()
	{
		return array('id' => array('Field' => 'id','Type' => 'int(11) unsigned','Null' => 'NO','Key' => 'PRI','Default' => NULL,'Extra' => 'auto_increment',),'tajapa_request' => array('Field' => 'tajapa_request','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'uid' => array('Field' => 'uid','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'created' => array('Field' => 'created','Type' => 'int(11)','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'amount' => array('Field' => 'amount','Type' => 'float','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'chosen' => array('Field' => 'chosen','Type' => 'tinyint(1)','Null' => 'NO','Key' => '','Default' => '0','Extra' => '',),'fulfilled' => array('Field' => 'fulfilled','Type' => 'tinyint(1)','Null' => 'NO','Key' => '','Default' => '0','Extra' => '',),'tajapa_marketplace' => array('Field' => 'tajapa_marketplace','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),);
	}

	public function table_name()
	{
		return 'tajapa_offer';
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

	public function amount($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'float'))
			{
				return false;
			}
			$this->push_update(array('amount'=>$d));
			$this->_fields['amount'] = $d;
			return true;
		}
		return $this->_fields['amount'];
	}

	public function chosen($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'tinyint',1))
			{
				return false;
			}
			$this->push_update(array('chosen'=>$d));
			$this->_fields['chosen'] = $d;
			return true;
		}
		return $this->_fields['chosen'];
	}

	public function fulfilled($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'tinyint',1))
			{
				return false;
			}
			$this->push_update(array('fulfilled'=>$d));
			$this->_fields['fulfilled'] = $d;
			return true;
		}
		return $this->_fields['fulfilled'];
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
}
?>