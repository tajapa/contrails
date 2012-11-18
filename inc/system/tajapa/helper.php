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

	function labeltosubdomain($s)
	{
		return UTIL::norm($s);
	}
}

?>