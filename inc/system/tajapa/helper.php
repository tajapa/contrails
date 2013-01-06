<?

class tajapa_helper
{

	function baseurl()
	{
		$u = explode("//",CONF::baseurl());
		$u = preg_replace("/www./","",$u[1]);
		return $u;
	}

	function marketfromurl()
	{
		$u = parse_url($_SERVER['SERVER_NAME']);
		$u = explode(".",$u['path']);
		if(count($u) == 3)
		{
			return $u[0];
		}
		return false;
	}

	function market_find()
	{
		$CRUD = &DB_CRUD::singleton();
		$MOF = &MF::singleton();
		// get the marketplace from the url
		$market = tajapa_helper::marketfromurl();
		if($market === false)
		{
			return false;
		}
		// get the id
		$r = $CRUD->load('tajapa_marketplace','url',$market);
		if($r->nr() != 1 || !is_object($r))
		{
			return false;
		}		
		$m = $MOF->obtain('tajapa_marketplace',$r->f('id'));
		return $m;
	}

	function labeltosubdomain($s)
	{
		return UTIL::norm($s);
	}
}

?>