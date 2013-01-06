<?

$e = $OPC->var_get('error');
$w = $OPC->var_get('warning');
$i = $OPC->var_get('information');
$s = $OPC->var_get('success');

if($e || $w || $i || $s)
{
  echo '<div class="row"><div class="span11">';
    if(isset($e))
    {
      echo '<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$e.'</div>';
    }
    if(isset($w))
    {
      echo '<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$w.'</div>';
    }
    if(isset($i))
    {
      echo '<div class="alert alert-info fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$i.'</div>';
    }
    if(isset($s))
    {
      echo '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$s.'</div>';
    }
  echo '</div></div>';
}

?>