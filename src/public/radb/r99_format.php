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

	$xml = new SimpleXMLElement($GLOBALS['RAURL'] . 'r99', null, true);

echo $xml;

foreach($xml as $key => $value)
{
    echo $key . " = " . $value . "<br />\n";
}


?>
</body>
</html>
