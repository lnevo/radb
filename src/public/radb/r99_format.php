<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("allow_url_fopen", 1);
error_reporting(E_ALL);
?>
<?php include('config.php'); ?>
<?php include('utils.php'); ?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<style type="text/css">
	body {
		margin-top: 20px;
	}
</style>
</head>

<body>

<div class="container-fluid"><div class="row-fluid"><div class="span12">

<ul class="breadcrumb">
  <li><a href="index.php">Dash Board</a> <span class="divider">/</span></li>
  <li class="active">r99 Data</li>
</ul>

<?php

$json = file_get_contents($GLOBALS['WEBROOT'] . "radb/all_data_json.php");
$someArray = json_decode($json, true);

//  Scan through outer loop
foreach ($someArray as $innerArray) {
    //  Check type
    if (is_array($innerArray)){
        //  Scan through inner loop
        foreach ($innerArray as $value => $key) {
            echo $value . "=" . $key . "<br>";
        }
    }
}

?>
</body>
</html>
