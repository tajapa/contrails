#!/usr/bin/php -q
<?
/**
*	handles language file consolidation
*	- extracts e::o strings from the whole project
*	- compares the keys against the existing keys in the language files
*	- adds missing keys
*	- consolidates all languages
*/

// get all modules
$m = scandir("inc/mods/");

verbose("SCANNING FOR LANGUAGES");

foreach($m as $mod)
{
	if(preg_match("/\./",$mod))
	{
		continue;
	}
	$l = scandir("inc/mods/".$mod."/language/");
	foreach($l as $k)
	{
		if(substr($k,-3)=='php')
		{
			$k = pathinfo($k);
			$languages[$k['filename']] = $k['filename'];
		}
	}
}

foreach($languages as $k)
{
	verbose($k,1);
}


$ignore = array
(
	'usradmin' => true,
	'page' => true,
	'acladmin' => true,
	'objbrowser' => true,
);

foreach($m as $mod)
{
	if(isset($ignore[$mod]))
	{
		continue;
	}
	if(preg_match("/\./",$mod))
	{
		continue;
	}
	verbose("GETTING KEYS FOR ".$mod);
	$keys = find_keys($mod);
	// now check for the keys in each lang-file
	foreach($languages as $l)
	{
		$f = "inc/mods/".$mod."/language/".$l.".php";
		if(!is_file($f))
		{
			file_put_contents($f, '<?$lang=array();?>');
		}
		$modified = false;
		include($f);
		foreach($keys as $k)
		{
			if(!isset($lang[$k]))
			{
				verbose("MISSING ".$k,2);
				$modified = true;
				$lang[$k] = $k;
			}
		}
		if($modified == true)
		{
			verbose("WRITING ".$l,1);
			array_to_file($f,$lang);
		}
	}
}

function array_to_file($f,$l)
{
	$o = "<?\n\$lang = array\n(\n";

	foreach($l as $k => $v)
	{
		if(is_array($v))
		{
			$o .= "\t".'"'.$k.'" => array'."\t\n".'('."\n";
			foreach($v as $vk => $vv)
			{
				$o .= "\t\t".'"'.$vk.'" => "'.$vv.'",'."\n";
			}
			$o .= "\t),\n";
		}
		else
		{
			$o .= "\t".'"'.$k.'" => "'.$v.'",'."\n";
		}
	}

	$o .= "\n);\n?>";
/*
	echo "\n\n\n";

	echo $o;

	echo "\n\n\n";
*/
	file_put_contents($f,$o);
}

function find_keys($m)
{
	// read all files (action/view/form/template --- for now)
	$k = parse("inc/mods/".$m."/class_".$m."Action.inc.php");
	$k = parse("inc/mods/".$m."/class_".$m."View.inc.php",$k);
	//
	$f = scandir("inc/mods/".$m."/form/");
	foreach($f as $file)
	{
		if(substr($file,-3) == 'php')
		{
			$k = parse("inc/mods/".$m."/form/".$file,$k);
		}
	}
	$f = scandir("inc/mods/".$m."/template/");
	foreach($f as $dir)
	{
		if(preg_match("/\./",$dir))
		{
			continue;
		}
		$l = scandir("inc/mods/".$m."/template/".$dir."/");
		foreach($l as $file)
		{
			if(substr($file,-3) == 'php')
			{
				$k = parse("inc/mods/".$m."/template/".$dir."/".$file,$k);
			}
		}
	}
	return $k;
}

function parse($f,$r=array())
{
	$d = file_get_contents($f);
	$d = explode("e::o(",$d);
	unset($d[0]);
	foreach($d as $k)
	{
		$s = substr($k,0,1);
		$tmp = explode($s,$k);
		verbose($tmp[1],1);
		$r[$tmp[1]] = $tmp[1];
	}
	return $r;
}

/**
*	show some info
*/

function verbose($s,$t=0)
{
	echo str_repeat("\t",$t).$s."\n";
}

?>