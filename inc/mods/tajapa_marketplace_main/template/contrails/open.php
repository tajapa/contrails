<?

echo '<h1>'.e::o('open_headline').'</h1>';

echo '<p>'.e::o('open_content').'</p>';

if(!$CLIENT->usr['is_default'])
{
	echo '<a class="btn btn-primary" href="'.$OPC->lnk(array(
		'event' => 'request',
		'mod' => 'tajapa_marketplace_main'
		)).'">'.e::o('create').'</a><br/><br/>';
}


$r = $OPC->var_get('list');

if(is_object($r))
{
	$count = $OPC->var_get('count');

	echo '<div class="accordion" id="requests">';

	$q = $OPC->var_get('quote');

	while($r->next())
	{
		$q->hidden('data[tajapa_request]',$r->f('id'));
		$cnt++;
		echo '
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#requests" href="#collapse'.$cnt.'">
				'.$r->f('label').'
				<div class="pull-right">
					Expires <span class="badge badge-info">'.tajapa_util::date_format($r->f('expires')).'</span> 
					<span class="badge badge-info">'.$count[$r->f('id')].'</span> Offers

				</div>
				</a>
			</div>
			<div id="collapse'.$cnt.'" class="accordion-body collapse">
				<div class="accordion-inner">
					<div class="well pull-left span3">
						'.tajapa_user::short($r->f('uid')).'
					</div>
					<div class="well pull-left span3">
						'.$r->f('description').'
					</div>
					<div class="well pull-left span3">
						'.$q->show().'
					</div>
				</div>
			</div>
		</div>
	  ';
	}

	echo '</div>';
}



?>