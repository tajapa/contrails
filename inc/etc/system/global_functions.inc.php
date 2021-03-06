<?
	// GLOBAL FUNCTIONS
	static $__autoload_models = array();
	// autoloader
	function __autoload($classname) 
	{
		// 
		global $__autoload_models;
		// handle models:
		if(count($__autoload_models) == 0)
		{
			$__autoload_models = scandir(CONF::inc_dir()."/models/");
		}

		if(in_array($classname,$__autoload_models))
		{
			require_once CONF::inc_dir()."/system/oos/class_model.inc.php";
			require_once CONF::inc_dir()."/models/".strtolower($classname)."/generated.php";
			require_once CONF::inc_dir()."/models/".strtolower($classname)."/model.php";
			return;
		}

		global $__autoload_constants;
		// handle models:
		if(count($__autoload_constants) == 0)
		{
			$__autoload_constants = scandir(CONF::inc_dir()."/constants/");
		}

		if(in_array(strtolower($classname).".inc.php",$__autoload_constants))
		{
			require_once CONF::inc_dir()."/constants/".strtolower($classname).".inc.php";
			return;
		}

		// 
		if (file_exists(CONF::inc_dir()."/system/oos/class_".strtolower($classname).".inc.php"))
		{
			require CONF::inc_dir()."/system/oos/class_".strtolower($classname).".inc.php";
		}
		elseif (file_exists(CONF::inc_dir()."/system/flourish/".$classname.".php"))
		{
			require CONF::inc_dir()."/system/flourish/".$classname.".php";
		}
		elseif(file_exists(CONF::inc_dir()."/system/".preg_replace("/_/", "/", $classname).".php"))
		{
			require CONF::inc_dir()."/system/".preg_replace("/_/", "/", $classname).".php";
		}
		else
		{
			print_r($__autoload_models);
			die("Class not found ".$classname." [0]");
		}
		if (!class_exists($classname)) 
		{
			die("Class not found ".$classname." [1]");
		}
	}
	
	function is_error($obj) 
	{
		return (is_object($obj) && get_class($obj) == 'error') ? true : false;
	}
	
	function background($mod,$event,$params = array(),$uid=null)
	{
		if(!$uid)
		{
			$client = &CLIENT::singleton();
			$uid = $client->usr['id'];
		}
		$buf = array
		(
			'mod' => $mod,
			'event' => $event,
			'params' => $params,
			'server' => $_SERVER['HTTP_HOST'],
			'uid' => $uid,
			'oos' => CONF::inc_dir()."/oos.sys"
		);
		$buf = base64_encode(serialize($buf));
		// now pass buff to a script that does the rest for us
		$cmd = CONF::inc_dir()."/system/background.php ".$buf." > /dev/null 2>&1 &";
#		MC::Debug($cmd);
		exec($cmd);
		return true;
	}
	
	// get the pid from some info in the path
	// if the path exists, send the user theres
function path_dispatch()
{
	if(!empty($_GET['file']))
	{
		if(!preg_match("/\./",$_GET['file']))
		{
			$p = explode("/",$_GET['file']);
			if(sizeof($p)!=0)
			{
				// now we have to search a page at the last entry
				$db = &DB::singleton();
				$select = "SELECT id FROM mod_page WHERE name = '".mysql_real_escape_string($p[sizeof($p)-1])."'";
				$r = $db->query($select);
				if($r->nr()==0)
				{
					$target = CONF::pid();
				}		
				elseif($r->nr()==1)
				{
					$target = $r->f('id');
				}
				else
				{
					// we found multiple pages and need to disambiguate
					// we get the path for each of them and try a match
					$n = new NestedSet();
					$n->set_table_name('mod_page');
					while($r->next())
					{
						$path = $n->getPath($r->f('id'));
						$i = array();
						foreach($path as $e)
						{
							$i[] = $e['name'];
						}
						$paths[$r->f('id')] = implode("/",$i);
					}
					foreach($paths as $pid => $path)
					{
						if(substr(strtolower($path),-strlen($_GET['file'])) == strtolower($_GET['file']))
						{
							$target = $pid;
							break;
						}
					}
				}
				if($target)
				{
					header('Location: '.CONF::baseurl().'/page_'.$target.'.html');
					die;
				}
			}
		}
	}
}
	
	
?>
