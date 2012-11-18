<?
class generated_tajapa_location extends model
{

	protected function _keys()
	{
		return array('0' => array('type' => 'PRIMARY KEY','fields' => array('0' => 'id',),),);
	}

	protected function _fields()
	{
		return array('id' => array('Field' => 'id','Type' => 'int(11) unsigned','Null' => 'NO','Key' => 'PRI','Default' => NULL,'Extra' => 'auto_increment',),'label' => array('Field' => 'label','Type' => 'varchar(255)','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'lon' => array('Field' => 'lon','Type' => 'float','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),'lat' => array('Field' => 'lat','Type' => 'float','Null' => 'YES','Key' => '','Default' => NULL,'Extra' => '',),);
	}

	public function table_name()
	{
		return 'tajapa_location';
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

	public function label($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'varchar',255))
			{
				return false;
			}
			$this->push_update(array('label'=>$d));
			$this->_fields['label'] = $d;
			return true;
		}
		return $this->_fields['label'];
	}

	public function lon($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'float'))
			{
				return false;
			}
			$this->push_update(array('lon'=>$d));
			$this->_fields['lon'] = $d;
			return true;
		}
		return $this->_fields['lon'];
	}

	public function lat($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'float'))
			{
				return false;
			}
			$this->push_update(array('lat'=>$d));
			$this->_fields['lat'] = $d;
			return true;
		}
		return $this->_fields['lat'];
	}
}
?>