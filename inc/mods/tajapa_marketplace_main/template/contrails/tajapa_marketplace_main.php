<?

$link = $OPC->var_get("link");
if(isset($link))
{
	echo '<a href="'.$link.'">'.e::o('link_tajapa_marketplace_main').'</a>';
}

echo $OPC->var_get("form")

?>