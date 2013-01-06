<?

echo '<h1>'.e::o('my_transactions_headline').'</h1>';

echo '<p>'.e::o('my_transactions_content').'</p>';


$r = $OPC->var_get('data');

echo '<div class="accordion" id="transactions">';

while($r->next())
{
	$cnt++;
	echo '
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#transactions" href="#collapse'.$cnt.'">';
			
			if($r->f('uid_to') == $CLIENT->usr['id'])
			{
				echo '<span class="badge badge-success">+'.$r->f('amount').'</span>';
			}
			else
			{
				echo '<span class="badge badge-important">-'.$r->f('amount').'</span>';	
			}


			echo '<div class="pull-right">
				<span class="badge badge-info">'.tajapa_util::date_format($r->f('created')).'</span> 
			</div>
			</a>
		</div>
		<div id="collapse'.$cnt.'" class="accordion-body collapse">
			<div class="accordion-inner">
				<div class="well pull-left span9">
					some more details
				</div>
			</div>
		</div>
	</div>
  ';
}

echo '</div>';

?>