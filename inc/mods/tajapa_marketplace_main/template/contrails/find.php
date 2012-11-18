<?

$r = $OPC->var_get('list');

if($r->nr() == 0)
{
	echo e::o('nothing_found');
}

$url = explode("//",CONF::baseurl());
$url = $url[1];

while($r->next())
{
	echo '<div class="navbar"><div class="navbar-inner"><a class="brand" href="http://'.$r->f('url').'.'.$url.'">'.$r->f('label').'</a></div></div>';
}

?>