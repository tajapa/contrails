<? 

if(false !== ($market = $MC->call('tajapa_marketplace_main','market_find')))
{
    $name = $market->label();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>tajapa <?=$name?></title>
    <link href="/template/tajapa/bootstrap/css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="/template/tajapa/bootstrap/css/bootstrap-responsive.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="/template/tajapa/tajapa/css/tajapa.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="/template/tajapa/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css" />
    
    <script src="/template/tajapa/tajapa/js/jquery.min.js"></script>
    <script src="/template/tajapa/bootstrap/js/bootstrap.js"></script>
    <script src="/template/tajapa/colorbox/jquery.colorbox-min.js"></script>
    <script src="/template/tajapa/tajapa/js/tajapa.js"></script>

    <link rel="shortcut icon" href="/template/tajapa/tajapa/img/favicon.ico" />

  </head>
  <body>
    <div class="navbar navbar-static-top">
      <div class="container">
        <?=$OPC->call('page','admin_panel')?>
        <div class="navbar-inner">
          <ul class="nav">
            <?=$OPC->call('tajapa_navigation','market') ?>
          </ul>
          <ul class="nav pull-right">
            <li>
              <?=tajapa_user::short($CLIENT->usr['id'])?>
            </li>
            <li>
              <?=$OPC->call('usradmin','loginlogout')?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <?
        // display the errors
        $e = $OPC->error();
        $w = $OPC->warning();
        $i = $OPC->information();
        $s = $OPC->success();
        if($e || $w || $i || $s)
        {
          echo '<div class="row"><div class="span12">';
            foreach($e as $msg)
            {
              echo '<div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
            }
            foreach($w as $msg)
            {
              echo '<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
            }
            foreach($i as $msg)
            {
              echo '<div class="alert alert-info fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
            }
            foreach($s as $msg)
            {
              echo '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button>'.$msg.'</div>';
            }
          echo '</div></div>';
        }
      ?>
      <div class="row">
        <div class="spancontent offsetcontent">
          <?=$OPC->call('tajapa_messaging','inbox','messaging')?>
        </div>
      </div>
    </div>
    <div class="container">
      <footer><?=tajapa_util::footer()?></footer>
    </div>
  </body>
</html>