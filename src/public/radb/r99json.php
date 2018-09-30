<?php include('config.php'); ?>

<?php

	function urlMaker($cmd,$val){
		$url = $GLOBALS['RAURL'] . $cmd;
		$url = ($val == "") ? $url : $url . "," . $val;
		return $url;
	}
	function applyMasks($a,$b,$c) {
		$a &= $c;		
		$a |= $b;
		return str_pad(decbin($a),8,"0",STR_PAD_LEFT);
	}	

	function getBin($a) {
		return str_pad(decbin($a),8,"0",STR_PAD_LEFT);
	}

	$xml = new SimpleXMLElement(urlMaker($_POST["cmd"],$_POST["val"]), null, true);

#  	$RBIN=getBin($xml->{'R'});
#   $RON=getBin($xml->{'RON'});
#   $ROFF=getBin($xml->{'ROFF'});
#   $RMASK=applyMasks($xml->{'R'},$xml->{'RON'},$xml->{'ROFF'});

	$RBIN1=getBin($xml->{'R1'});
    $RON1=getBin($xml->{'RON1'});
    $ROFF1=getBin($xml->{'ROFF1'});
	$RMASK1=applyMasks($xml->{'R1'},$xml->{'RON1'},$xml->{'ROFF1'});

  	$RBIN2=getBin($xml->{'R2'});
    $RON2=getBin($xml->{'RON2'});
    $ROFF2=getBin($xml->{'ROFF2'});
	$RMASK2=applyMasks($xml->{'R2'},$xml->{'RON2'},$xml->{'ROFF2'});

  	$RBIN3=getBin($xml->{'R3'});
    $RON3=getBin($xml->{'RON3'});
    $ROFF3=getBin($xml->{'ROFF3'});
	$RMASK3=applyMasks($xml->{'R3'},$xml->{'RON3'},$xml->{'ROFF3'});

  	$RBIN4=getBin($xml->{'R4'});
    $RON4=getBin($xml->{'RON4'});
    $ROFF4=getBin($xml->{'ROFF4'});
	$RMASK4=applyMasks($xml->{'R4'},$xml->{'RON4'},$xml->{'ROFF4'});

  	$RBIN5=getBin($xml->{'R5'});
    $RON5=getBin($xml->{'RON5'});
    $ROFF5=getBin($xml->{'ROFF5'});
	$RMASK5=applyMasks($xml->{'R5'},$xml->{'RON5'},$xml->{'ROFF5'});

	$relayData = array();
/*  	$relayData["rbin"]=$RBIN;
  	$relayData["relay1val"]=$RBIN[7];
	$relayData["relay2val"]=$RBIN[6];
	$relayData["relay3val"]=$RBIN[5];
	$relayData["relay4val"]=$RBIN[4];
	$relayData["relay5val"]=$RBIN[3];
	$relayData["relay6val"]=$RBIN[2];
	$relayData["relay7val"]=$RBIN[1];
	$relayData["relay8val"]=$RBIN[0];
	$relayData["relay1on"]=$RON[7];
	$relayData["relay2on"]=$RON[6];
	$relayData["relay3on"]=$RON[5];
	$relayData["relay4on"]=$RON[4];
	$relayData["relay5on"]=$RON[3];
	$relayData["relay6on"]=$RON[2];
	$relayData["relay7on"]=$RON[1];
	$relayData["relay8on"]=$RON[0];
	$relayData["relay1off"]=$ROFF[7];
	$relayData["relay2off"]=$ROFF[6];
	$relayData["relay3off"]=$ROFF[5];
	$relayData["relay4off"]=$ROFF[4];
	$relayData["relay5off"]=$ROFF[3];
	$relayData["relay6off"]=$ROFF[2];
	$relayData["relay7off"]=$ROFF[1];
	$relayData["relay8off"]=$ROFF[0];
	$relayData["relay1status"]=$RMASK[7];
	$relayData["relay2status"]=$RMASK[6];
	$relayData["relay3status"]=$RMASK[5];
	$relayData["relay4status"]=$RMASK[4];
	$relayData["relay5status"]=$RMASK[3];
	$relayData["relay6status"]=$RMASK[2];
	$relayData["relay7status"]=$RMASK[1];
	$relayData["relay8status"]=$RMASK[0];
*/
  	$relayData["rbin1"]=$RBIN1;
  	$relayData["relay11val"]=$RBIN1[7];
	$relayData["relay12val"]=$RBIN1[6];
	$relayData["relay13val"]=$RBIN1[5];
	$relayData["relay14val"]=$RBIN1[4];
	$relayData["relay15val"]=$RBIN1[3];
	$relayData["relay16val"]=$RBIN1[2];
	$relayData["relay17val"]=$RBIN1[1];
	$relayData["relay18val"]=$RBIN1[0];
	$relayData["relay11on"]=$RON1[7];
	$relayData["relay12on"]=$RON1[6];
	$relayData["relay13on"]=$RON1[5];
	$relayData["relay14on"]=$RON1[4];
	$relayData["relay15on"]=$RON1[3];
	$relayData["relay16on"]=$RON1[2];
	$relayData["relay17on"]=$RON1[1];
	$relayData["relay18on"]=$RON1[0];
	$relayData["relay11off"]=$ROFF1[7];
	$relayData["relay12off"]=$ROFF1[6];
	$relayData["relay13off"]=$ROFF1[5];
	$relayData["relay14off"]=$ROFF1[4];
	$relayData["relay15off"]=$ROFF1[3];
	$relayData["relay16off"]=$ROFF1[2];
	$relayData["relay17off"]=$ROFF1[1];
	$relayData["relay18off"]=$ROFF1[0];
	$relayData["relay11status"]=$RMASK1[7];
	$relayData["relay12status"]=$RMASK1[6];
	$relayData["relay13status"]=$RMASK1[5];
	$relayData["relay14status"]=$RMASK1[4];
	$relayData["relay15status"]=$RMASK1[3];
	$relayData["relay16status"]=$RMASK1[2];
	$relayData["relay17status"]=$RMASK1[1];
	$relayData["relay18status"]=$RMASK1[0];

  	$relayData["rbin2"]=$RBIN2;
  	$relayData["relay21val"]=$RBIN2[7];
	$relayData["relay22val"]=$RBIN2[6];
	$relayData["relay23val"]=$RBIN2[5];
	$relayData["relay24val"]=$RBIN2[4];
	$relayData["relay25val"]=$RBIN2[3];
	$relayData["relay26val"]=$RBIN2[2];
	$relayData["relay27val"]=$RBIN2[1];
	$relayData["relay28val"]=$RBIN2[0];
	$relayData["relay21on"]=$RON2[7];
	$relayData["relay22on"]=$RON2[6];
	$relayData["relay23on"]=$RON2[5];
	$relayData["relay24on"]=$RON2[4];
	$relayData["relay25on"]=$RON2[3];
	$relayData["relay26on"]=$RON2[2];
	$relayData["relay27on"]=$RON2[1];
	$relayData["relay28on"]=$RON2[0];
	$relayData["relay21off"]=$ROFF2[7];
	$relayData["relay22off"]=$ROFF2[6];
	$relayData["relay23off"]=$ROFF2[5];
	$relayData["relay24off"]=$ROFF2[4];
	$relayData["relay25off"]=$ROFF2[3];
	$relayData["relay26off"]=$ROFF2[2];
	$relayData["relay27off"]=$ROFF2[1];
	$relayData["relay28off"]=$ROFF2[0];
	$relayData["relay21status"]=$RMASK2[7];
	$relayData["relay22status"]=$RMASK2[6];
	$relayData["relay23status"]=$RMASK2[5];
	$relayData["relay24status"]=$RMASK2[4];
	$relayData["relay25status"]=$RMASK2[3];
	$relayData["relay26status"]=$RMASK2[2];
	$relayData["relay27status"]=$RMASK2[1];
	$relayData["relay28status"]=$RMASK2[0];

  	$relayData["rbin3"]=$RBIN3;
  	$relayData["relay31val"]=$RBIN3[7];
	$relayData["relay32val"]=$RBIN3[6];
	$relayData["relay33val"]=$RBIN3[5];
	$relayData["relay34val"]=$RBIN3[4];
	$relayData["relay35val"]=$RBIN3[3];
	$relayData["relay36val"]=$RBIN3[2];
	$relayData["relay37val"]=$RBIN3[1];
	$relayData["relay38val"]=$RBIN3[0];
	$relayData["relay31on"]=$RON3[7];
	$relayData["relay32on"]=$RON3[6];
	$relayData["relay33on"]=$RON3[5];
	$relayData["relay34on"]=$RON3[4];
	$relayData["relay35on"]=$RON3[3];
	$relayData["relay36on"]=$RON3[2];
	$relayData["relay37on"]=$RON3[1];
	$relayData["relay38on"]=$RON3[0];
	$relayData["relay31off"]=$ROFF3[7];
	$relayData["relay32off"]=$ROFF3[6];
	$relayData["relay33off"]=$ROFF3[5];
	$relayData["relay34off"]=$ROFF3[4];
	$relayData["relay35off"]=$ROFF3[3];
	$relayData["relay36off"]=$ROFF3[2];
	$relayData["relay37off"]=$ROFF3[1];
	$relayData["relay38off"]=$ROFF3[0];
	$relayData["relay31status"]=$RMASK3[7];
	$relayData["relay32status"]=$RMASK3[6];
	$relayData["relay33status"]=$RMASK3[5];
	$relayData["relay34status"]=$RMASK3[4];
	$relayData["relay35status"]=$RMASK3[3];
	$relayData["relay36status"]=$RMASK3[2];
	$relayData["relay37status"]=$RMASK3[1];
	$relayData["relay38status"]=$RMASK3[0];

  	$relayData["rbin4"]=$RBIN4;
  	$relayData["relay41val"]=$RBIN4[7];
	$relayData["relay42val"]=$RBIN4[6];
	$relayData["relay43val"]=$RBIN4[5];
	$relayData["relay44val"]=$RBIN4[4];
	$relayData["relay45val"]=$RBIN4[3];
	$relayData["relay46val"]=$RBIN4[2];
	$relayData["relay47val"]=$RBIN4[1];
	$relayData["relay48val"]=$RBIN4[0];
	$relayData["relay41on"]=$RON4[7];
	$relayData["relay42on"]=$RON4[6];
	$relayData["relay43on"]=$RON4[5];
	$relayData["relay44on"]=$RON4[4];
	$relayData["relay45on"]=$RON4[3];
	$relayData["relay46on"]=$RON4[2];
	$relayData["relay47on"]=$RON4[1];
	$relayData["relay48on"]=$RON4[0];
	$relayData["relay41off"]=$ROFF4[7];
	$relayData["relay42off"]=$ROFF4[6];
	$relayData["relay43off"]=$ROFF4[5];
	$relayData["relay44off"]=$ROFF4[4];
	$relayData["relay45off"]=$ROFF4[3];
	$relayData["relay46off"]=$ROFF4[2];
	$relayData["relay47off"]=$ROFF4[1];
	$relayData["relay48off"]=$ROFF4[0];
	$relayData["relay41status"]=$RMASK4[7];
	$relayData["relay42status"]=$RMASK4[6];
	$relayData["relay43status"]=$RMASK4[5];
	$relayData["relay44status"]=$RMASK4[4];
	$relayData["relay45status"]=$RMASK4[3];
	$relayData["relay46status"]=$RMASK4[2];
	$relayData["relay47status"]=$RMASK4[1];
	$relayData["relay48status"]=$RMASK4[0];


  	$relayData["rbin5"]=$RBIN5;
  	$relayData["relay51val"]=$RBIN5[7];
	$relayData["relay52val"]=$RBIN5[6];
	$relayData["relay53val"]=$RBIN5[5];
	$relayData["relay54val"]=$RBIN5[4];
	$relayData["relay55val"]=$RBIN5[3];
	$relayData["relay56val"]=$RBIN5[2];
	$relayData["relay57val"]=$RBIN5[1];
	$relayData["relay58val"]=$RBIN5[0];
	$relayData["relay51on"]=$RON5[7];
	$relayData["relay52on"]=$RON5[6];
	$relayData["relay53on"]=$RON5[5];
	$relayData["relay54on"]=$RON5[4];
	$relayData["relay55on"]=$RON5[3];
	$relayData["relay56on"]=$RON5[2];
	$relayData["relay57on"]=$RON5[1];
	$relayData["relay58on"]=$RON5[0];
	$relayData["relay51off"]=$ROFF5[7];
	$relayData["relay52off"]=$ROFF5[6];
	$relayData["relay53off"]=$ROFF5[5];
	$relayData["relay54off"]=$ROFF5[4];
	$relayData["relay55off"]=$ROFF5[3];
	$relayData["relay56off"]=$ROFF5[2];
	$relayData["relay57off"]=$ROFF5[1];
	$relayData["relay58off"]=$ROFF5[0];
	$relayData["relay51status"]=$RMASK5[7];
	$relayData["relay52status"]=$RMASK5[6];
	$relayData["relay53status"]=$RMASK5[5];
	$relayData["relay54status"]=$RMASK5[4];
	$relayData["relay55status"]=$RMASK5[3];
	$relayData["relay56status"]=$RMASK5[2];
	$relayData["relay57status"]=$RMASK5[1];
	$relayData["relay58status"]=$RMASK5[0];

	$return = array();
	$return["xml"] = $xml;
	$return["relays"] = $relayData;
	
	echo json_encode($return);
?>
