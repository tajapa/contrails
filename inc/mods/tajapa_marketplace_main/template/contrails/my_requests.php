<?

echo '<h1>'.e::o('my_requests_headline').'</h1>';

echo '<p>'.e::o('my_requests_content').'</p>';


echo '<a class="btn btn-primary" href="'.$OPC->lnk(array(
	'event' => 'request',
	'mod' => 'tajapa_marketplace_main'
	)).'">'.e::o('create').'</a><br/><br/>';

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
						if($d['request']['expires'] < time())
						{
							echo e::o('expired').' <span class="badge badge-important">'.tajapa_util::date_format($d['request']['expires']).'</span> 
							<span class="badge badge-info">'.count($d['offers']).'</span> Offers';
						}
						else
						{
							echo e::o('expires').' <span class="badge badge-info">'.tajapa_util::date_format($d['request']['expires']).'</span> 
							<span class="badge badge-info">'.count($d['offers']).'</span> Offers';
						}
					}
					elseif($d['request']['status'] == 2)
					{
						echo '<span class="badge badge-warning">'.e::o('pending_fulfillment').'</span> ';
					}
					elseif($d['request']['status'] == 3)
					{
						echo '<span class="badge badge-success">'.e::o('fulfilled').'</span> ';
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

						if($d['request']['status'] == 1)
						{
							if($d['request']['expires'] < time())
							{
								foreach($d['offers'] as $o)
								{
									echo $o['amount'].' '.tajapa_user::short($o['uid']).'<br/>';
								}
							}
							else
							{
								foreach($d['offers'] as $o)
								{
									echo '<a href="'.$OPC->lnk(array(
										'event' => 'offer_book',
										'mod' => 'tajapa_marketplace_main',
										'data[offer]' => $o['id']
										)).'" class="btn">'.e::o('book').' '.tajapa_user::short($o['uid']).' '.e::o('for').' '.$o['amount'].'</a><br/>';
								}
							}
						}
						// show the chosen offer
						else
						{
							foreach($d['offers'] as $o)
							{
								if($o['chosen'] == 1)
								{
									if($o['fulfilled'] != 1)
									{
										
										echo '<a href="'.$OPC->lnk(array(
											'event' => 'offer_fulfilled',
											'mod' => 'tajapa_marketplace_main',
											'data[offer]' => $o['id'],
											'data[stars]' => 5
										)).'" class="btn-large btn-success">'.e::o('btn_fulfilled_5_stars').'</a><br/><br/><br/>';

										echo '<a href="'.$OPC->lnk(array(
											'event' => 'offer_fulfilled',
											'mod' => 'tajapa_marketplace_main',
											'data[offer]' => $o['id'],
											'data[stars]' => 4
										)).'" class="btn-large btn-primary">'.e::o('btn_fulfilled_4_stars').'</a><br/><br/><br/>';

										echo '<a href="'.$OPC->lnk(array(
											'event' => 'offer_fulfilled',
											'mod' => 'tajapa_marketplace_main',
											'data[offer]' => $o['id'],
											'data[stars]' => 3
										)).'" class="btn-large btn-warning">'.e::o('btn_fulfilled_3_stars').'</a><br/><br/><br/>';
										
										echo '<a href="'.$OPC->lnk(array(
											'event' => 'offer_fulfilled',
											'mod' => 'tajapa_marketplace_main',
											'data[offer]' => $o['id'],
											'data[stars]' => 2
										)).'" class="btn-large btn-danger">'.e::o('btn_fulfilled_2_stars').'</a><br/><br/><br/>';

										echo '<a href="'.$OPC->lnk(array(
											'event' => 'offer_fulfilled',
											'mod' => 'tajapa_marketplace_main',
											'data[offer]' => $o['id'],
											'data[stars]' => 1
										)).'" class="btn-large btn-inverse">'.e::o('btn_fulfilled_1_stars').'</a><br/><br/><br/>';

									}
									echo $o['amount'].' '.tajapa_user::short($o['uid']).'<br>';
								}
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