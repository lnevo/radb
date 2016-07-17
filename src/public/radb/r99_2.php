
<?php
 include('config.php'); 

	 $xml = new SimpleXMLElement($GLOBALS['R99cache2'], null, true);

echo $xml;

foreach($xml as $key => $value)
{
    echo $key . "=" . $value . "\n";
}


?>
