<?php
  # Controller URL
  $GLOBALS['RAURL']="http://YOUR.RA.IP:2000/";
  # Labels

  # External URLS
  $GLOBALS['RACAM']="http://YOUR.WEBCAM.IP:8080/image.jpg?cidx=584511813&timestamp=";
  $GLOBALS['RACAM2']="http://YOUR.WEBCAM.IP:8090/image/jpeg.cgi";

  # Data Files
  $GLOBALS['WEBROOT']="http://YOUR.WEB.SERVER/";
  $GLOBALS['RADB']=$GLOBALS['WEBROOT'] . "radb/";
  $GLOBALS['MRTG']=$GLOBALS['WEBROOT'] . "mrtg/";
  $GLOBALS['RADB_DATA']=$GLOBALS['RADB'] . "data/";
  $GLOBALS['LabelURL']=$GLOBALS['RADB_DATA'] . "ra_labels.txt";
  $GLOBALS['R99cache']=$GLOBALS['RADB_DATA'] . "r99.txt";
  $GLOBALS['CustomMemCache']=$GLOBALS['RADB_DATA'] . "mr_custom.txt";
  $GLOBALS['FullMemCache']=$GLOBALS['RADB_DATA'] . "mr_full_mem.txt";
  $GLOBALS['AllCache']=$GLOBALS['RADB_DATA'] . "all_data.txt";
?>
