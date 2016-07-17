<?php include('config.php'); ?>
<?php

	function urlMaker($cmd,$val){
		$url = $GLOBALS['RAURL'] . $cmd;
		$url = ($val == "") ? $url : $url . "," . $val;

		return $url;
	}

	$xml = new SimpleXMLElement(urlMaker($_POST["cmd"],$_POST["val"]), null, true);

	$return = array();
	$return["xml"] = $xml;
	
	echo json_encode($return);
?>
