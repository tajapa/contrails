<?
class generated_uftp_unfucks extends model
{
	var $_fields = array();
	var $_table = 'uftp_unfucks';

	protected function _keys()
	{
		return array('0' => array('type' => 'PRIMARY KEY','fields' => array('0' => 'id',),),'1' => array('type' => 'KEY','fields' => array('0' => 'fuck_id','1' => 'location_id','2' => 'user_id',),),);
	}

	protected function _fields()
	{
		return array('id' => array('Field' => 'id','Type' => 'int(11) unsigned','Null' => 'NO','Key' => 'PRI','Default' => NULL,'Extra' => 'auto_increment',),'description' => array('Field' => 'description','Type' => 'text','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'fuck_id' => array('Field' => 'fuck_id','Type' => 'int(11)','Null' => 'YES','Key' => 'MUL','Default' => NULL,'Extra' => '',),'user_id' => array('Field' => 'user_id','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'location_id' => array('Field' => 'location_id','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'executed' => array('Field' => 'executed','Type' => 'int(1)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'created_at' => array('Field' => 'created_at','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'updated_at' => array('Field' => 'updated_at','Type' => 'int(11)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),);
	}

	function id($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->_fields['id'] = $d;
			return true;
		}
		return $this->_fields['id'];
	}

	function description($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'text'))
			{
				return false;
			}
			$this->_fields['description'] = $d;
			return true;
		}
		return $this->_fields['description'];
	}

	function fuck_id($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->_fields['fuck_id'] = $d;
			return true;
		}
		return $this->_fields['fuck_id'];
	}

	function user_id($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->_fields['user_id'] = $d;
			return true;
		}
		return $this->_fields['user_id'];
	}

	function location_id($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->_fields['location_id'] = $d;
			return true;
		}
		return $this->_fields['location_id'];
	}

	function executed($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',1))
			{
				return false;
			}
			$this->_fields['executed'] = $d;
			return true;
		}
		return $this->_fields['executed'];
	}

	function created_at($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->_fields['created_at'] = $d;
			return true;
		}
		return $this->_fields['created_at'];
	}

	function updated_at($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',11))
			{
				return false;
			}
			$this->_fields['updated_at'] = $d;
			return true;
		}
		return $this->_fields['updated_at'];
	}
}
?>