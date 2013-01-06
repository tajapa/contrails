<?
echo '<h1>'.e::o('my_messages_headline').'</h1>';

echo '<p>'.e::o('my_messages_content').'</p>';

echo $this->var_get('nav');

$r = $this->var_get('messages');

if(!is_object($r))
{
	echo '<div class="alert alert-info fade in">'.e::o('no_received_messages').'</div>';
}
elseif($r->nr() == 0)
{
	echo '<div class="alert alert-info fade in">'.e::o('no_received_messages').'</div>';	
}
else
{
	echo '<div class="accordion" id="messages">';

	while($r->next())
	{
		$cnt++;
		echo '
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#messages" href="#collapse'.$cnt.'">
				'.$r->f('subject').' '.e::o('from').' '.$r->f('usr_from').' 
				<div class="pull-right">
					<span class="badge badge-info">'.tajapa_util::date_format($r->f('created')).'</span> 
				</div>
				</a>
			</div>
			<div id="collapse'.$cnt.'" class="accordion-body collapse">
				<div class="accordion-inner">
					<div class="well pull-left span10">
						'.nl2br($r->f('body')).'
					</div>
					<br/>
					<a href="'.$OPC->lnk(array('mod'=>'tajapa_messaging','event'=>'compose','data[init]'=>true,'data[to]'=>$r->f('usr_from'),'data[subject]'=>'Re: '.$r->f('subject'))).'" class="btn">'.e::o('reply').'</a>
				</div>
			</div>
		</div>
	  ';
	}

	echo '</div>';
}

?>

