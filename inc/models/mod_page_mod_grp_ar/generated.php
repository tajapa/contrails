<?
class generated_mod_page_mod_grp_ar extends model
{

	protected function _keys()
	{
		return array('0' => array('type' => 'KEY','fields' => array('0' => 'pid','1' => 'gid','2' => 'mid',),),);
	}

	protected function _fields()
	{
		return array('pid' => array('Field' => 'pid','Type' => 'int(10) unsigned','Null' => 'NO','Key' => 'MUL','Default' => NULL,'Extra' => '',),'gid' => array('Field' => 'gid','Type' => 'int(10) unsigned','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'mid' => array('Field' => 'mid','Type' => 'int(10) unsigned','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'ar' => array('Field' => 'ar','Type' => 'int(32) unsigned','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),'inherit_pid' => array('Field' => 'inherit_pid','Type' => 'int(10) unsigned','Null' => 'NO','Key' => '','Default' => NULL,'Extra' => '',),);
	}

	public function table_name()
	{
		return 'mod_page_mod_grp_ar';
	}


	public function pid($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',10))
			{
				return false;
			}
			$this->push_update(array('pid'=>$d));
			$this->_fields['pid'] = $d;
			return true;
		}
		return $this->_fields['pid'];
	}

	public function gid($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',10))
			{
				return false;
			}
			$this->push_update(array('gid'=>$d));
			$this->_fields['gid'] = $d;
			return true;
		}
		return $this->_fields['gid'];
	}

	public function mid($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',10))
			{
				return false;
			}
			$this->push_update(array('mid'=>$d));
			$this->_fields['mid'] = $d;
			return true;
		}
		return $this->_fields['mid'];
	}

	public function ar($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',32))
			{
				return false;
			}
			$this->push_update(array('ar'=>$d));
			$this->_fields['ar'] = $d;
			return true;
		}
		return $this->_fields['ar'];
	}

	public function inherit_pid($d=null)
	{
		if($d !== null)
		{
			if(!$this->_valid($d,'int',10))
			{
				return false;
			}
			$this->push_update(array('inherit_pid'=>$d));
			$this->_fields['inherit_pid'] = $d;
			return true;
		}
		return $this->_fields['inherit_pid'];
	}
}
?>