<?

echo '<h1>'.e::o('open_headline').'</h1>';

echo '<p>'.e::o('open_content').'</p>';

echo '<a class="btn btn-primary" href="'.$OPC->lnk(array(
	'event' => 'request',
	'mod' => 'tajapa_marketplace_main'
	)).'">'.e::o('create').'</a><br/><br/>';

$r = $OPC->var_get('list');

while($r->next())
{
	echo '<div class="navbar"><div class="navbar-inner"><a class="brand" href="#">'.$r->f('label').'</a></div></div>';
}

?>