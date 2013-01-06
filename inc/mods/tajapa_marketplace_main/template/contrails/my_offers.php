<?

echo '<h1>'.e::o('my_offers_headline').'</h1>';

echo '<p>'.e::o('my_offers_content').'</p>';


$data = $OPC->var_get('data');

if(is_array($data))
{

	echo '<div class="accordion" id="requests">';

	foreach($data as $d)
	{
		$cnt++;
		echo '
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#requests" href="#collapse'.$cnt.'">
				'.$d['request']['label'].'
				<div class="pull-right">';

					if($d['request']['status'] == 1)
					{
						echo e::o('expires').' <span class="badge badge-info">'.tajapa_util::date_format($d['request']['expires']).'</span> 
						<span class="badge badge-info">'.count($d['offers']).'</span> Offers';
					}
					elseif($d['request']['status'] == 2)
					{
						echo '<span class="badge badge-warning">'.e::o('pending_fulfillment').'</span> ';
					}

				echo '</div>
				</a>
			</div>
			<div id="collapse'.$cnt.'" class="accordion-body collapse">
				<div class="accordion-inner">
					<div class="well pull-left span3">
						'.$d['request']['description'].'
					</div>
					<div class="well pull-left span6">';
						
						// show the offers if it is not yet closed

						foreach($d['offers'] as $o)
						{
							if($o['chosen'] == 1)
							{
								echo '<span class="label label-success">'.$o['amount'].'</span><br/>';
							}
							else
							{
								echo '<span class="label">'.$o['amount'].'</span><br/>';
							}
						}

					echo '</div>
				</div>
			</div>
		</div>
	  ';
	}

	echo '</div>';
}
?>