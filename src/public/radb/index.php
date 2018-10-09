<?php include('config.php'); ?>
<?php include('utils.php'); ?>
<?php include('ra_labels.php'); ?>

<!DOCTYPE html>
<html manifest=manifest.appcache>
  <head>
    <title>
      RA Dashboard
    </title>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="apple-touch-icon" href="images/icon.png" />
    <link rel="apple-touch-startup-image" href="" />
    <meta name="viewport" content="initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
  
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="css/add2home.css">
    <script type="application/javascript" src="css/add2home.js"></script>
  
    <script src="css/jquery.min.js">
    </script>
    <script src="RGraph/libraries/RGraph.common.core.js" >
    </script>
    <script src="RGraph/libraries/RGraph.gauge.js" >
    </script>
    <!--[if lt IE 9]>
<script src="RGraph/excanvas/excanvas.js">
</script>
<![endif]-->
  
  <style type="text/css">
	body {
    margin-top: 20px;
  }
  
  #statustab {
	text-align: center;
  }
  #dt {
    width: 80%;
  }
  #ph {
    width: 80%;
  }
  #wl {
    width: 80%;
  }
  #moon {
    width: 80%;
  }
  #test {
    width: 90%;
  }
  
  #atolow {
    width: 35px;
  }
  #atohigh {
    width: 35px;
  }
  #alarm {
    width: 35px;
  }
  #sumpalarm {
    width: 15%;
  }
  #atoAlarm {
    width: 15%;
  }
  
  #powerAlarm {
    width: 15%;
  }
  #fcrow {
    text-align: center;
  }
  
  #relayBar1 {
    text-align: center;
  }
  #relayBar2 {
    text-align: center;
  }
  #relayBar3 {
    text-align: center;
  }
  #relayBar4 {
    text-align: center;
  }
  #relayBar5 {
    text-align: center;
  }
  #atoBar {
    text-align: center;
  }
  .relayLED {
    width: 35px;
  }
  #relaytab {
    text-align: right;
  }
  .relayBarLabel {
    text-align: left;
  }
  
  #mode {
    width: 80%;
  }
  #speed {
    width: 80%;
  }
  #duration {
    width: 80%;
  }
  
  .rr {
    width:100%;
    text-align: center;
  }
  .rl {
    width:60%;
    float: left;
    text-align: right;
  }
  .rb {
    width:20%;
    float: left;
  }
  #refresh {
    width: 30px;
  }
  ;
  
  </style>
  </head>
  
  <body>
    
  <div class="container-fluid">
    <div class="tabbable">
      
      <!-- Only required for left/right tabs -->
      <div class="visible-phone">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#statustab" id="phoneStatusTab" data-toggle="tab" class="tab-refresh statustabTab">
              Main
            </a>
          </li>
          <li>
            <a href="#relaytab" id="phoneRelayTab" data-cmd="r99" data-toggle="tab" class="tab-refresh relaytabTab relayToggle">
              Relays
            </a>
          </li>
          <li>
            <a href="#controlstab" id="phoneControlTab" data-toggle="tab" class="tab-refresh controlstabTab">
              Controls
            </a>
          </li>
          <li>
            <a href="#linkstab" id="phoneLinksTab" data-toggle="tab" class="tab-refresh linkstabTab">
              Links
            </a>
          </li>
        </ul>
    </div>
    <div class="hidden-phone">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#statustab" id="StatusTab" data-toggle="tab" class="tab-refresh statustabTab">
            Main
          </a>
        </li>
        <li>
          <a href="#relaytab" id="RelayTab" data-cmd="r99" data-toggle="tab" class="tab-refresh relaytabTab relayToggle">
            Relays
          </a>
        </li>
        <li>
          <a href="#controlstab" id="ControlsTab" data-toggle="tab" class="tab-refresh controlstabTab">
            Controls
          </a>
        </li>
        <li>
          <a href="#chartstab" id="ChartsTab" data-toggle="tab" class="tab-refresh chartstabTab">
            Charts
          </a>
        </li>
        
        <li>
          <a href="#linkstab" id="LinksTab" data-toggle="tab" class="tab-refresh linkstabTab">
            Links
          </a>
        </li>
      </ul>
    </div>
    
    <div class="well well-small">
      <div class="row-fluid">
        <div id="fcrow">
          <IMG SRC="images/webcam.jpg" id="fishcam">
          <IMG SRC="images/webcam2.jpg" id="sumpcam">
		</div>
      </div>
    </div>
    <div class="tab-content">
      <div class="tab-pane active" id="statustab">
        
        <div class="visible-phone">
          <span id="T1Label">
            T1:
          </span>
          <div class="progress"> <div class="bar" id="T1Bar" style="width: 0%;"> </div> </div>
        <span id="PHLabel"> PH: </span>
        <div class="progress"> <div class="bar" id="PHBar" style="width: 0%;"> </div> </div>
        <span id="SALLabel"> SAL: </span>
        <div class="progress"> <div class="bar" id="SALBar" style="width: 0%;"> </div> </div>
        <span id="RFSLabel"> RFS: </span>
        <div class="progress"> <div class="bar" id="RFSBar" style="width: 0%;"> </div> </div>
        <span id="WLLabel"> ATO: </span>
        <div class="progress"> <div class="bar" id="WLBar" style="width: 0%;"> </div> </div>
        <span id="WLLabel2"> Saltwater: </span>
        <div class="progress"> <div class="bar" id="WLBar1" style="width: 0%;"> </div> </div>
        <div class="progress"> <div class="bar" id="WLBar2" style="width: 0%;"> </div> </div>
        <span id="MainLabel">Lights: </span>
        <div class="progress"> <div class="bar" id="PWME0Bar" style="width: 0%;"> </div> </div>
        <div class="progress"> <div class="bar" id="PWME1Bar" style="width: 0%;"> </div> </div>
        <div class="progress"> <div class="bar" id="PWME2Bar" style="width: 0%;"> </div> </div>
        <div class="progress"> <div class="bar" id="PWME3Bar" style="width: 0%;"> </div> </div>
        <span id="PWMALabel"> Moonlights: </span>
        <div class="progress"> <div class="bar" id="PWMABar" style="width: 0%;"> </div> </div>
        <div class="progress"> <div class="bar" id="PWMDBar" style="width: 0%;"> </div> </div>
      </div>

        
        <div class="hidden-phone">
          <div class="well well-small">
            <div class="row-fluid">
              <div class="span4">
                <canvas id="dt" width="250" height="250">
                  [No canvas support]
                </canvas>
                
              </div>
              
              <div class="span4">
                <a href="#collapse03">
                  <canvas id="speed" width="250" height="250">
                    [No canvas support]
                  </canvas>
                </a>
                
              </div>
              <div class="span4">
                
                <canvas id="ph" width="250" height="250">
                  [No canvas support]
                </canvas>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span2 offset2">
                <h5>
                  ATO Low
                </h5>
                <?= switchStatus("",'atolow'); ?>
              </div>
              <div class="span2 offset1">
                <h5>
                  ATO High
                </h5>
                <?= switchStatus("",'atohigh'); ?>
              </div>
              <div class="span2 offset1">
                <h5>
                  Skimmate Locker
                </h5>
                <?= switchStatus("",'alarm'); ?>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span3">
                <canvas id="wl" width="250" height="250">
                  [No canvas support]
                </canvas>
                
              </div>
              <div class="span3">
                <canvas id="mode" width="250" height="250">
                  [No canvas support]
                </canvas>
                
              </div>
              <div class="span3">
                <canvas id="duration" width="250" height="250">
                  [No canvas support]
                </canvas>
                
              </div>
              <div class="span3">
                <canvas id="moon" width="250" height="250">
                  [No canvas support]
                </canvas>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="tab-pane" id="relaytab">
        
        <div class="hidden-phone">
          <div class="row-fluid" id="relayBar1">
            <div class="well well-small">
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= $R11N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R12N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R13N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R14N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R15N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R16N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R17N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R18N; ?>
                  
                </div>
              </div>
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= relayLED("11","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("12","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("13","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("14","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("15","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("16","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("17","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("18","",""); ?>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="row-fluid" id="relayBar2">
            <div class="well well-small">
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= $R21N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R22N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R23N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R24N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R25N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R26N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R27N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R28N; ?>
                  
                </div>
              </div>
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= relayLED("21","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("22","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("23","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("24","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("25","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("26","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("27","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("28","",""); ?>
                  
                </div>
              </div>
            </div>
          </div>
        
          <div class="row-fluid" id="relayBar3">
            <div class="well well-small">
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= $R31N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R32N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R33N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R34N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R35N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R36N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R37N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R38N; ?>
                  
                </div>
              </div>
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= relayLED("31","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("32","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("33","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("34","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("35","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("36","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("37","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("38","",""); ?>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="row-fluid" id="relayBar4">
            <div class="well well-small">
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= $R41N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R42N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R43N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R44N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R45N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R46N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R47N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R48N; ?>
                  
                </div>
              </div>
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= relayLED("41","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("42","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("43","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("44","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("45","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("46","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("47","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("48","",""); ?>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="row-fluid" id="relayBar5">
            <div class="well well-small">
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= $R51N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R52N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R53N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R54N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R55N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R56N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R57N; ?>
                  
                </div>
                <div class="span1">
                  
                  <?= $R58N; ?>
                  
                </div>
              </div>
              <div class="row-fluid">
                <div class="span2">
                </div>
                <div class="span1">
                  
                  <?= relayLED("51","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("52","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("53","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("54","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("55","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("56","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("57","",""); ?>
                  
                </div>
                <div class="span1">
                  
                  <?= relayLED("58","",""); ?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="visible-phone">
          <div class="well well-small">
            <div class="relayBarLabel">
              <h5>
                Exp. Relay 1
              </h5>
            </div>
            <div class="span1">
              <?= $R11N; ?>
              <div class="btn-group">
                <?= relayButton("r11On","On","r111",""); ?>
                <?= relayButton("r11Off","Off","r110",""); ?>
                
                <?= relayButton("r11Auto","Auto","r112",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R12N; ?>
              <div class="btn-group">
                <?= relayButton("r12On","On","r121",""); ?>
                <?= relayButton("r12Off","Off","r120",""); ?>
                
                <?= relayButton("r12Auto","Auto","r122",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R13N; ?>
              <div class="btn-group">
                <?= relayButton("r13On","On","r131",""); ?>
                <?= relayButton("r13Off","Off","r130",""); ?>
                
                <?= relayButton("r13Auto","Auto","r132",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R14N; ?>
              <div class="btn-group">
                <?= relayButton("r14On","On","r141",""); ?>
                <?= relayButton("r14Off","Off","r140",""); ?>
                
                <?= relayButton("r14Auto","Auto","r142",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R15N; ?>
              <div class="btn-group">
                <?= relayButton("r15On","On","r151",""); ?>
                <?= relayButton("r15Off","Off","r150",""); ?>
                
                <?= relayButton("r15Auto","Auto","r152",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R16N; ?>
              <div class="btn-group">
                <?= relayButton("r16On","On","r161",""); ?>
                <?= relayButton("r16Off","Off","r160",""); ?>
                
                <?= relayButton("r16Auto","Auto","r162",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R17N; ?>
              <div class="btn-group">
                <?= relayButton("r17On","On","r171",""); ?>
                <?= relayButton("r17Off","Off","r170",""); ?>
                
                <?= relayButton("r17Auto","Auto","r172",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R18N; ?>
              <div class="btn-group">
                <?= relayButton("r18On","On","r181",""); ?>
                <?= relayButton("r18Off","Off","r180",""); ?>
                
                <?= relayButton("r18Auto","Auto","r182",""); ?>
                
              </div>
              
            </div>
          </div>
          <div class="well well-small">
            <div class="relayBarLabel">
              <h5>
                Exp. Relay 2
              </h5>
            </div>
            <div class="span1">
              <?= $R21N; ?>
              <div class="btn-group">
                <?= relayButton("r21On","On","r211",""); ?>
                <?= relayButton("r21Off","Off","r210",""); ?>
                
                <?= relayButton("r21Auto","Auto","r212",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R22N; ?>
              <div class="btn-group">
                <?= relayButton("r22On","On","r221",""); ?>
                <?= relayButton("r22Off","Off","r220",""); ?>
                
                <?= relayButton("r22Auto","Auto","r222",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R23N; ?>
              <div class="btn-group">
                <?= relayButton("r23On","On","r231",""); ?>
                <?= relayButton("r23Off","Off","r230",""); ?>
                
                <?= relayButton("r23Auto","Auto","r232",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R24N; ?>
              <div class="btn-group">
                <?= relayButton("r24On","On","r241",""); ?>
                <?= relayButton("r24Off","Off","r240",""); ?>
                
                <?= relayButton("r24Auto","Auto","r242",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R25N; ?>
              <div class="btn-group">
                <?= relayButton("r25On","On","r251",""); ?>
                <?= relayButton("r25Off","Off","r250",""); ?>
                
                <?= relayButton("r25Auto","Auto","r252",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R26N; ?>
              <div class="btn-group">
                <?= relayButton("r26On","On","r261",""); ?>
                <?= relayButton("r26Off","Off","r260",""); ?>
                
                <?= relayButton("r26Auto","Auto","r262",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R27N; ?>
              <div class="btn-group">
                <?= relayButton("r27On","On","r271",""); ?>
                <?= relayButton("r27Off","Off","r270",""); ?>
                
                <?= relayButton("r27Auto","Auto","r272",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R28N; ?>
              <div class="btn-group">
                <?= relayButton("r28On","On","r281",""); ?>
                <?= relayButton("r28Off","Off","r280",""); ?>
                
                <?= relayButton("r28Auto","Auto","r282",""); ?>
                
              </div>
              
            </div>
          </div>
          <div class="well well-small">
            <div class="relayBarLabel">
              <h5>
                Exp. Relay 3
              </h5>
            </div>
            <div class="span1">
              <?= $R31N; ?>
              <div class="btn-group">
                <?= relayButton("r31On","On","r311",""); ?>
                <?= relayButton("r31Off","Off","r310",""); ?>
                
                <?= relayButton("r31Auto","Auto","r312",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R32N; ?>
              <div class="btn-group">
                <?= relayButton("r32On","On","r321",""); ?>
                <?= relayButton("r32Off","Off","r320",""); ?>
                
                <?= relayButton("r32Auto","Auto","r322",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R33N; ?>
              <div class="btn-group">
                <?= relayButton("r33On","On","r331",""); ?>
                <?= relayButton("r33Off","Off","r330",""); ?>
                
                <?= relayButton("r33Auto","Auto","r332",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R34N; ?>
              <div class="btn-group">
                <?= relayButton("r34On","On","r341",""); ?>
                <?= relayButton("r34Off","Off","r340",""); ?>
                
                <?= relayButton("r34Auto","Auto","r342",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R35N; ?>
              <div class="btn-group">
                <?= relayButton("r35On","On","r351",""); ?>
                <?= relayButton("r35Off","Off","r350",""); ?>
                
                <?= relayButton("r35Auto","Auto","r352",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R36N; ?>
              <div class="btn-group">
                <?= relayButton("r36On","On","r361",""); ?>
                <?= relayButton("r36Off","Off","r360",""); ?>
                
                <?= relayButton("r36Auto","Auto","r362",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R37N; ?>
              <div class="btn-group">
                <?= relayButton("r37On","On","r371",""); ?>
                <?= relayButton("r37Off","Off","r370",""); ?>
                
                <?= relayButton("r37Auto","Auto","r372",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R38N; ?>
              <div class="btn-group">
                <?= relayButton("r38On","On","r381",""); ?>
                <?= relayButton("r38Off","Off","r380",""); ?>
                
                <?= relayButton("r38Auto","Auto","r382",""); ?>
                
              </div>
              
            </div>
          </div>
          <div class="well well-small">
            <div class="relayBarLabel">
              <h5>
                Exp. Relay 4
              </h5>
            </div>
            <div class="span1">
              <?= $R41N; ?>
              <div class="btn-group">
                <?= relayButton("r41On","On","r411",""); ?>
                <?= relayButton("r41Off","Off","r410",""); ?>
                
                <?= relayButton("r41Auto","Auto","r412",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R42N; ?>
              <div class="btn-group">
                <?= relayButton("r42On","On","r421",""); ?>
                <?= relayButton("r42Off","Off","r420",""); ?>
                
                <?= relayButton("r42Auto","Auto","r422",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R43N; ?>
              <div class="btn-group">
                <?= relayButton("r43On","On","r431",""); ?>
                <?= relayButton("r43Off","Off","r430",""); ?>
                
                <?= relayButton("r43Auto","Auto","r432",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R44N; ?>
              <div class="btn-group">
                <?= relayButton("r44On","On","r441",""); ?>
                <?= relayButton("r44Off","Off","r440",""); ?>
                
                <?= relayButton("r44Auto","Auto","r442",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R45N; ?>
              <div class="btn-group">
                <?= relayButton("r45On","On","r451",""); ?>
                <?= relayButton("r45Off","Off","r450",""); ?>
                
                <?= relayButton("r45Auto","Auto","r452",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R46N; ?>
              <div class="btn-group">
                <?= relayButton("r46On","On","r461",""); ?>
                <?= relayButton("r46Off","Off","r460",""); ?>
                
                <?= relayButton("r46Auto","Auto","r462",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R47N; ?>
              <div class="btn-group">
                <?= relayButton("r47On","On","r471",""); ?>
                <?= relayButton("r47Off","Off","r470",""); ?>
                
                <?= relayButton("r47Auto","Auto","r472",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R48N; ?>
              <div class="btn-group">
                <?= relayButton("r48On","On","r481",""); ?>
                <?= relayButton("r48Off","Off","r480",""); ?>
                
                <?= relayButton("r48Auto","Auto","r482",""); ?>
                
              </div>
              
            </div>
          </div>
          <div class="well well-small">
            <div class="relayBarLabel">
              <h5>
                Exp. Relay 5
              </h5>
            </div>
            <div class="span1">
              <?= $R51N; ?>
              <div class="btn-group">
                <?= relayButton("r51On","On","r511",""); ?>
                <?= relayButton("r51Off","Off","r510",""); ?>
                
                <?= relayButton("r51Auto","Auto","r512",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R52N; ?>
              <div class="btn-group">
                <?= relayButton("r52On","On","r521",""); ?>
                <?= relayButton("r52Off","Off","r520",""); ?>
                
                <?= relayButton("r52Auto","Auto","r522",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R53N; ?>
              <div class="btn-group">
                <?= relayButton("r53On","On","r531",""); ?>
                <?= relayButton("r53Off","Off","r530",""); ?>
                
                <?= relayButton("r53Auto","Auto","r532",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R54N; ?>
              <div class="btn-group">
                <?= relayButton("r54On","On","r541",""); ?>
                <?= relayButton("r54Off","Off","r540",""); ?>
                
                <?= relayButton("r54Auto","Auto","r542",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R55N; ?>
              <div class="btn-group">
                <?= relayButton("r55On","On","r551",""); ?>
                <?= relayButton("r55Off","Off","r550",""); ?>
                
                <?= relayButton("r55Auto","Auto","r552",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R56N; ?>
              <div class="btn-group">
                <?= relayButton("r56On","On","r561",""); ?>
                <?= relayButton("r56Off","Off","r560",""); ?>
                
                <?= relayButton("r56Auto","Auto","r562",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R57N; ?>
              <div class="btn-group">
                <?= relayButton("r57On","On","r571",""); ?>
                <?= relayButton("r57Off","Off","r570",""); ?>
                
                <?= relayButton("r57Auto","Auto","r572",""); ?>
                
              </div>
              
            </div>
            <div class="span1">
              <?= $R58N; ?>
              <div class="btn-group">
                <?= relayButton("r58On","On","r581",""); ?>
                <?= relayButton("r58Off","Off","r580",""); ?>
                
                <?= relayButton("r58Auto","Auto","r582",""); ?>
                
              </div>
              
            </div>
          </div>
          <div class="well well-small">
            <?= ajaxButton("iFeedingMode","Feed","mf",""); ?>
            <?= ajaxButton("iWCMode","Waterchange","mw",""); ?>
            <?= ajaxButton("iCancelMode","Cancel","bp",""); ?>
            
          </div>
        </div>
      </div>
      
      <div class="tab-pane" id="linkstab">
        <div class="row-fluid">
          <div class="span12">
            <div class="span6">
              <div class="well well-small">
                <h3>
                  Lee's Reef
                </h3>
                <A HREF="http://forum.reefangel.com/portal.php">
                  RA Portal
                </A>
                <BR>
                <A HREF="<?= $GLOBALS['MRTG'] ?>/radb_index.html">
                  MRTG Graphs
                </A>
                <BR>
                <A HREF="http://www.aquaticlog.com/aquarium/aquariums?aquariumId=2982">
                  AquaticLog.com
                </A>
              </div>
            </div>
            <div class="visible-phone">
              <div class="span6">
                <div class="well well-small">
                  <h3>
                    Charts
                  </h3>
                  <a href="<?= $GLOBALS['MRTG'] ?>/temp.html">
                    Temps
                  </A>
                  <BR>
                  <a href="<?= $GLOBALS['MRTG'] ?>/ph.html">
                    pH
                  </A>
                  <BR>
                  <a href="<?= $GLOBALS['MRTG'] ?>/sal.html">
                    Salinity
                  </A>
                  <BR>
                  <a href="<?= $GLOBALS['MRTG'] ?>/pwm.html">
                    PWM %
                  </A>
                  <BR>
                  <a href="<?= $GLOBALS['MRTG'] ?>/wl.html">
                    ATO Water Level
                  </A>
                  <BR>
                  <a href="<?= $GLOBALS['MRTG'] ?>/rf.html">
                    Vortech Speed
                  </A>
                  <BR>
                  <a href="<?= $GLOBALS['MRTG'] ?>/dosing.html">
                    Dosing
                  </A>
                  <BR>
                </div>
              </div>
            </div>
            <div class="span6">
              <div class="well well-small">
                <h3>
                  News
                </h3>
                <A HREF="http://reefbuilders.com">
                  Reef Builders
                </A>
                <BR>
                <A HREF="http://blog.aquanerd.com">
                  Blog.Aquanerd
                </A>
                <BR>
                <A HREF="http://advancedaquarist.com">
                  Advanced Aquarist
                </A>
                <BR>
                <A HREF="http://reefs.com">
                  Reefs.com
                </A>
                <BR>
                <A HREF="http://www.saltwatersmarts.com">
                  Saltwater Smarts
                </A>
              </div>
            </div>
          </div>
        </div>
        <!--
<p>
Howdy, I'm in Section 2.
</p>
-->
      </div>
      
      <div class="tab-pane" id="chartstab">
      </div>
      
      <div class="tab-pane" id="controlstab">
        <?= collapse("collapse01","Maintenance"); ?>
        <?= collapse("collapse02","ATO"); ?>
        <?= collapse("collapse02a","Water Change"); ?>
        <?= collapse("collapse03","RF Control"); ?>
        <?= collapse("collapse04","RF Program Settings"); ?>
        <?= collapse("collapse05","Lighting"); ?>
        <?= collapse("collapse06","Vacation Control"); ?>
        <?= collapse("collapse07","Swabbie Control"); ?>
        <?= collapse("collapse08","Dosing Pumps"); ?>
        <?= collapse("collapse09","Override Masks"); ?>
        <?= collapse("collapse10","Memory"); ?>
      </div>
    </div>
  </div>
  </div>

<script type="text/javascript">
    var camURL="<?=$GLOBALS['RACAM']; ?>";
    var sumpcamURL="<?=$GLOBALS['RACAM2']; ?>";
    var localStg=false;

    var gauge = new RGraph.Gauge('speed', 0, 100,0,0,0);
    var mode_gauge = new RGraph.Gauge('mode', 0, 15, 0,0,0);
    var dur_gauge = new RGraph.Gauge('duration', 0, 20,0,0);
    var wl_gauge = new RGraph.Gauge('wl', 0, 100,0);
    var moon_gauge = new RGraph.Gauge('moon', 0, 100,0,0,0,0,0,0);
    var dt_temp = new RGraph.Gauge('dt', 70, 85,0,0);
    var ph_gauge = new RGraph.Gauge('ph', 7, 9, 0);

    if(typeof(Storage)!=="undefined")
    {
      // Yes! localStorage and sessionStorage support!
      // Some code.....
      console.log("Local Storage supported");
      localStg=true;
      console.log(localStorage.lastPage);
    }

    function drawSpeedGauge() {
      gauge.Set('chart.title.top', 'Speed');
      gauge.Set('chart.title.top.size', 'Italic 18');
      gauge.Set('chart.title.top.font', 'Arial');
      gauge.Set('chart.title.top.color', 'white');
      gauge.Set('chart.title.bottom.size', 'Normal 10');
      gauge.Set('chart.title.bottom.font', 'Arial');
      gauge.Set('chart.title.bottom.color', '#0f0');
      gauge.Set('chart.title.bottom.pos', 0.4);
      gauge.Set('chart.background.color', 'black');
      gauge.Set('chart.background.gradient', true);
      gauge.Set('chart.centerpin.color', '#666');
      gauge.Set('chart.needle.colors', [RGraph.RadialGradient(gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'white'),
                                        RGraph.RadialGradient(gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#d66'),
                                        RGraph.RadialGradient(gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#949494')]);
      gauge.Set('chart.needle.size', [null, 50, 35]);
      gauge.Set('chart.needle.type', 'line');
      gauge.Set('chart.text.color', 'white');
      gauge.Set('chart.tickmarks.big.color', 'white');
      gauge.Set('chart.tickmarks.medium.color', 'white');
      gauge.Set('chart.tickmarks.small.color', 'white');
      gauge.Set('chart.border.outer', '#666');
      gauge.Set('chart.border.inner', '#333');
      gauge.Set('chart.colors.ranges', []);
      gauge.Set('chart.colors.ranges', [[80, 90, 'orange'], [90, 100, '#800']])
        gauge.Draw();
    }
    
    function drawModeGauge() {
      mode_gauge.Set('chart.title.top', 'Mode');
      mode_gauge.Set('chart.title.top.size', 'Italic 18');
      mode_gauge.Set('chart.title.top.font', 'Arial');
      mode_gauge.Set('chart.title.top.color', 'white');
      mode_gauge.Set('chart.title.bottom.size', 'Normal 12');
      mode_gauge.Set('chart.title.bottom.font', 'Arial');
      mode_gauge.Set('chart.title.bottom.color', '#0f0');
      mode_gauge.Set('chart.title.bottom.pos', 0.4);
      mode_gauge.Set('chart.background.color', 'black');
      mode_gauge.Set('chart.background.gradient', true);
      mode_gauge.Set('chart.centerpin.color', '#666');
      mode_gauge.Set('chart.needle.colors', [RGraph.RadialGradient(mode_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'white'),
                                             RGraph.RadialGradient(mode_gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#d66'),
                                             RGraph.RadialGradient(mode_gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#949494')]);
      mode_gauge.Set('chart.needle.size', [null, 50, 35]);
      mode_gauge.Set('chart.needle.type', 'line');
      mode_gauge.Set('chart.text.color', 'white');
      mode_gauge.Set('chart.tickmarks.big.color', 'white');
      mode_gauge.Set('chart.tickmarks.medium.color', 'white');
      mode_gauge.Set('chart.tickmarks.small.color', 'white');
      mode_gauge.Set('chart.border.outer', '#666');
      mode_gauge.Set('chart.radius', '10');
      mode_gauge.Set('chart.border.inner', '#333');
      mode_gauge.Set('chart.colors.ranges', []);
      mode_gauge.Set('chart.colors.ranges', [[12, 13.5, 'orange'], [13.5, 15, '#800']])
        mode_gauge.Draw();
    }
    
    function drawDurGauge() {
      dur_gauge.Set('chart.title.top', 'Duration');
      dur_gauge.Set('chart.title.top.size', 'Italic 18');
      dur_gauge.Set('chart.title.top.font', 'Arial');
      dur_gauge.Set('chart.title.top.color', 'white');
      dur_gauge.Set('chart.title.bottom.size', 'Normal 12');
      dur_gauge.Set('chart.title.bottom.font', 'Arial');
      dur_gauge.Set('chart.title.bottom.color', '#0f0');
      dur_gauge.Set('chart.title.bottom.pos', 0.4);
      dur_gauge.Set('chart.background.color', 'black');
      dur_gauge.Set('chart.background.gradient', true);
      dur_gauge.Set('chart.centerpin.color', '#666');
      dur_gauge.Set('chart.needle.colors', [RGraph.RadialGradient(dur_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'white'),
                                            RGraph.RadialGradient(dur_gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#d66'),
                                            RGraph.RadialGradient(dur_gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#d66')]);
      dur_gauge.Set('chart.needle.size', [null, 50, 50]);
      dur_gauge.Set('chart.needle.type', 'line');
      dur_gauge.Set('chart.text.color', 'white');
      dur_gauge.Set('chart.tickmarks.big.color', 'white');
      dur_gauge.Set('chart.tickmarks.medium.color', 'white');
      dur_gauge.Set('chart.tickmarks.small.color', 'white');
      dur_gauge.Set('chart.border.outer', '#666');
      dur_gauge.Set('chart.border.inner', '#333');
      dur_gauge.Set('chart.colors.ranges', []);
      dur_gauge.Set('chart.colors.ranges', [[16, 18, 'orange'], [18, 20, '#800']])
        dur_gauge.Draw();
    }
    
    function drawWLGauge() {
      wl_gauge.Set('chart.title.top', 'ATO');
      wl_gauge.Set('chart.title.top.size', 'Italic 18');
      wl_gauge.Set('chart.title.top.font', 'Arial');
      wl_gauge.Set('chart.title.top.color', 'white');
      wl_gauge.Set('chart.title.bottom.size', 'Normal 12');
      wl_gauge.Set('chart.title.bottom.font', 'Arial');
      wl_gauge.Set('chart.title.bottom.color', '#0f0');
      wl_gauge.Set('chart.title.bottom.pos', 0.4);
      wl_gauge.Set('chart.background.color', 'black');
      wl_gauge.Set('chart.background.gradient', true);
      wl_gauge.Set('chart.centerpin.color', '#666');
      wl_gauge.Set('chart.needle.colors', [RGraph.RadialGradient(wl_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'white'),
                                           RGraph.RadialGradient(wl_gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#d66'),
                                           RGraph.RadialGradient(wl_gauge, 125, 125, 0, 125, 125, 25, 'transparent', '#d66')]);
      wl_gauge.Set('chart.needle.size', [null, 50, 50]);
      wl_gauge.Set('chart.needle.type', 'line');
      wl_gauge.Set('chart.text.color', 'white');
      wl_gauge.Set('chart.tickmarks.big.color', 'white');
      wl_gauge.Set('chart.tickmarks.medium.color', 'white');
      wl_gauge.Set('chart.tickmarks.small.color', 'white');
      wl_gauge.Set('chart.border.outer', '#666');
      wl_gauge.Set('chart.border.inner', '#333');
      wl_gauge.Set('chart.colors.ranges', []);
      wl_gauge.Set('chart.colors.ranges', [[0, 10, '#800'], [10, 20, 'orange']])
        wl_gauge.Draw();
    }
    
    function drawPWMGauge() {
      moon_gauge.Set('chart.title.top', 'PWM');
      moon_gauge.Set('chart.title.top.size', 'Italic 16');
      moon_gauge.Set('chart.title.top.font', 'Arial');
      moon_gauge.Set('chart.title.top.color', 'white');
      moon_gauge.Set('chart.title.bottom.font', 'Arial');
      moon_gauge.Set('chart.title.bottom.size', 'Normal 12');
      moon_gauge.Set('chart.title.bottom.color', '#0f0');
      moon_gauge.Set('chart.title.bottom.pos', 0.4);
      moon_gauge.Set('chart.background.color', 'black');
      moon_gauge.Set('chart.background.gradient', true);
      moon_gauge.Set('chart.centerpin.color', '#666');
      moon_gauge.Set('chart.needle.colors', [RGraph.RadialGradient(moon_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'cyan'),
                                             RGraph.RadialGradient(moon_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'cyan'),
                                             RGraph.RadialGradient(moon_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'white'),
                                             RGraph.RadialGradient(moon_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'blue'),
                                             RGraph.RadialGradient(moon_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'white'),
                                             RGraph.RadialGradient(moon_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'blue')]);
      moon_gauge.Set('chart.needle.size', [60, 60, null, null, null, null, null]);
      moon_gauge.Set('chart.needle.type', 'line');
      moon_gauge.Set('chart.text.color', 'white');
      moon_gauge.Set('chart.tickmarks.big.color', 'white');
      moon_gauge.Set('chart.tickmarks.medium.color', 'white');
      moon_gauge.Set('chart.tickmarks.small.color', 'white');
      moon_gauge.Set('chart.border.outer', '#666');
      moon_gauge.Set('chart.border.inner', '#333');
      moon_gauge.Set('chart.colors.ranges', []);
      moon_gauge.Draw();
    }
    
    function drawTempGauge() {
      dt_temp.Set('chart.title.top', 'Temp');
      dt_temp.Set('chart.title.top.size', 'Italic 18');
      dt_temp.Set('chart.title.top.font', 'Arial');
      dt_temp.Set('chart.title.top.color', 'white');
      dt_temp.Set('chart.title.bottom.size', 'Normal 12');
      dt_temp.Set('chart.title.bottom.font', 'Arial');
      dt_temp.Set('chart.title.bottom.color', '#0f0');
      dt_temp.Set('chart.title.bottom.pos', 0.4);
      dt_temp.Set('chart.background.color', 'black');
      dt_temp.Set('chart.background.gradient', true);
      dt_temp.Set('chart.centerpin.color', '#666');
      dt_temp.Set('chart.needle.colors', [RGraph.RadialGradient(dt_temp, 125, 125, 0, 125, 125, 25, 'transparent', 'white'),
                                          RGraph.RadialGradient(dt_temp, 125, 125, 0, 125, 125, 25, 'transparent', '#d66'),
                                          RGraph.RadialGradient(dt_temp, 125, 125, 0, 125, 125, 25, 'transparent', '#949494')]);
      dt_temp.Set('chart.needle.size', [null, 50, 35]);
      dt_temp.Set('chart.needle.type', 'line');
      dt_temp.Set('chart.text.color', 'white');
      dt_temp.Set('chart.tickmarks.big.color', 'white');
      dt_temp.Set('chart.tickmarks.medium.color', 'white');
      dt_temp.Set('chart.tickmarks.small.color', 'white');
      dt_temp.Set('chart.border.outer', '#666');
      dt_temp.Set('chart.border.inner', '#333');
      dt_temp.Set('chart.colors.ranges', []);
      dt_temp.Set('chart.colors.ranges', [ [70,73,'#800'],[73,75,'orange'], [75, 80, '#070'],[80,82,'orange'],[82,85,'#800']])
        dt_temp.Draw();
    }
    
    function drawPHGauge() {
      ph_gauge.Set('chart.scale.decimals',1);
      ph_gauge.Set('chart.title.top', 'pH');
      ph_gauge.Set('chart.title.top.size', 'Italic 18');
      ph_gauge.Set('chart.title.top.font', 'Arial');
      ph_gauge.Set('chart.title.top.color', 'white');
      ph_gauge.Set('chart.title.bottom.size', 'Normal 10');
      ph_gauge.Set('chart.title.bottom.font', 'Arial');
      ph_gauge.Set('chart.title.bottom.color', '#0f0');
      ph_gauge.Set('chart.title.bottom.pos', 0.4);
      ph_gauge.Set('chart.background.color', 'black');
      ph_gauge.Set('chart.background.gradient', true);
      ph_gauge.Set('chart.centerpin.color', '#666');
      ph_gauge.Set('chart.needle.colors', [RGraph.RadialGradient(ph_gauge, 125, 125, 0, 125, 125, 25, 'transparent', 'white')]);
      ph_gauge.Set('chart.needle.size', [null, 50, 50]);
      ph_gauge.Set('chart.needle.type', 'line');
      ph_gauge.Set('chart.text.color', 'white');
      ph_gauge.Set('chart.tickmarks.big.color', 'white');
      ph_gauge.Set('chart.tickmarks.medium.color', 'white');
      ph_gauge.Set('chart.tickmarks.small.color', 'white');
      ph_gauge.Set('chart.border.outer', '#666');
      ph_gauge.Set('chart.border.inner', '#333');
      ph_gauge.Set('chart.colors.ranges', []);
      ph_gauge.Set('chart.colors.ranges', [ [7.0,7.4,'#800'],[7.4,7.8,'orange'],[7.8,8.2,'#070'],[8.2,8.6,'orange'],[8.6,9,'#800']])
        ph_gauge.Draw();
    }
	
    window.onload = function() {
    }
      
    function goToPage(url) {
      location.href = url;
    }
    
function refreshAllData(data) {
	console.log(data);

	refreshData(data);
	gauge.value=[data.xml.RFS, data.mem.Mem_B_RFSpeed, data.xml.C4 ];
	mode_gauge.value=[data.xml.RFM, data.mem.Mem_B_RFMode, data.mem.Mem_B_TideMode];
	dur_gauge.value=[data.xml.RFD, data.mem.Mem_B_RFDuration];
	wl_gauge.value=data.xml.WL;
	moon_gauge.value=[data.xml.PWMA, data.xml.PWMD, data.xml.PWME0, data.xml.PWME1, data.xml.PWME2, data.xml.PWME3];
	dt_temp.value=[data.xml.T1/10,data.xml.T2/10,data.xml.T3/10];
	ph_gauge.value=data.xml.PH/100;

	gauge.Set('chart.title.bottom', data.xml.RFS + '%');
	mode_gauge.Set('chart.title.bottom', data.xml.RFM==11 ? data.mem.Mem_B_TideMode :data.xml.RFM );
	dur_gauge.Set('chart.title.bottom', data.xml.RFD);
	wl_gauge.Set('chart.title.bottom', data.xml.WL + '%');
	moon_gauge.Set('chart.title.bottom', '%');
	dt_temp.Set('chart.title.bottom',data.xml.T1/10);
	ph_gauge.Set('chart.title.bottom', data.xml.PH/100);

	drawWLGauge();
	drawPWMGauge();
	drawTempGauge();
	drawPHGauge();
	drawSpeedGauge();
	drawModeGauge();
	drawDurGauge();

	for (var key in data.xml) {
       	 $("[data-xml-key='" + key + "']").text(data.xml[key]);
       	 $("[data-xml-key='" + key + "']").val(data.xml[key]);
	}

	for (var key in data.mem) {
       	 $("[data-mem-key='" + key + "']").text(data.mem[key]);
       	 $("[data-mem-key='" + key + "']").val(data.mem[key]);
	 $str = "OFF";
         if (data.mem[key])
            $str = "ON";
       	 $("[data-mem-status-key='" + key + "']").text($str);
	}

	for (var key in data.info) {
       	 $("[data-info-key='" + key + "']").text(data.info[key]);
       	 $("[data-info-key='" + key + "']").val(data.info[key]);
	}

	$("#rfmode").val(data.mem["Mem_B_RFMode"]).attr('selected','selected');
	$("#TideMode").val(data.mem["Mem_B_TideMode"]).attr('selected','selected');
}

function refreshData(data) {
    // console.log(data);
/*    updateRelay("1",data.relays.relay1val,data.relays.relay1on,data.relays.relay1off);
    updateRelay("2",data.relays.relay2val,data.relays.relay2on,data.relays.relay2off);
    updateRelay("3",data.relays.relay3val,data.relays.relay3on,data.relays.relay3off);
    updateRelay("4",data.relays.relay4val,data.relays.relay4on,data.relays.relay4off);
    updateRelay("5",data.relays.relay5val,data.relays.relay5on,data.relays.relay5off);
    updateRelay("6",data.relays.relay6val,data.relays.relay6on,data.relays.relay6off);
    updateRelay("7",data.relays.relay7val,data.relays.relay7on,data.relays.relay7off);
    updateRelay("8",data.relays.relay8val,data.relays.relay8on,data.relays.relay8off);
*/
    updateRelay("11",data.relays.relay11val,data.relays.relay11on,data.relays.relay11off);
    updateRelay("12",data.relays.relay12val,data.relays.relay12on,data.relays.relay12off);
    updateRelay("13",data.relays.relay13val,data.relays.relay13on,data.relays.relay13off);
    updateRelay("14",data.relays.relay14val,data.relays.relay14on,data.relays.relay14off);
    updateRelay("15",data.relays.relay15val,data.relays.relay15on,data.relays.relay15off);
    updateRelay("16",data.relays.relay16val,data.relays.relay16on,data.relays.relay16off);
    updateRelay("17",data.relays.relay17val,data.relays.relay17on,data.relays.relay17off);
    updateRelay("18",data.relays.relay18val,data.relays.relay18on,data.relays.relay18off);
    updateRelay("21",data.relays.relay21val,data.relays.relay21on,data.relays.relay21off);
    updateRelay("22",data.relays.relay22val,data.relays.relay22on,data.relays.relay22off);
    updateRelay("23",data.relays.relay23val,data.relays.relay23on,data.relays.relay23off);
    updateRelay("24",data.relays.relay24val,data.relays.relay24on,data.relays.relay24off);
    updateRelay("25",data.relays.relay25val,data.relays.relay25on,data.relays.relay25off);
    updateRelay("26",data.relays.relay26val,data.relays.relay26on,data.relays.relay26off);
    updateRelay("27",data.relays.relay27val,data.relays.relay27on,data.relays.relay27off);
    updateRelay("28",data.relays.relay28val,data.relays.relay28on,data.relays.relay28off);
    updateRelay("31",data.relays.relay31val,data.relays.relay31on,data.relays.relay31off);
    updateRelay("32",data.relays.relay32val,data.relays.relay32on,data.relays.relay32off);
    updateRelay("33",data.relays.relay33val,data.relays.relay33on,data.relays.relay33off);
    updateRelay("34",data.relays.relay34val,data.relays.relay34on,data.relays.relay34off);
    updateRelay("35",data.relays.relay35val,data.relays.relay35on,data.relays.relay35off);
    updateRelay("36",data.relays.relay36val,data.relays.relay36on,data.relays.relay36off);
    updateRelay("37",data.relays.relay37val,data.relays.relay37on,data.relays.relay37off);
    updateRelay("38",data.relays.relay38val,data.relays.relay38on,data.relays.relay38off);
    updateRelay("41",data.relays.relay41val,data.relays.relay41on,data.relays.relay41off);
    updateRelay("42",data.relays.relay42val,data.relays.relay42on,data.relays.relay42off);
    updateRelay("43",data.relays.relay43val,data.relays.relay43on,data.relays.relay43off);
    updateRelay("44",data.relays.relay44val,data.relays.relay44on,data.relays.relay44off);
    updateRelay("45",data.relays.relay45val,data.relays.relay45on,data.relays.relay45off);
    updateRelay("46",data.relays.relay46val,data.relays.relay46on,data.relays.relay46off);
    updateRelay("47",data.relays.relay47val,data.relays.relay47on,data.relays.relay47off);
    updateRelay("48",data.relays.relay48val,data.relays.relay48on,data.relays.relay48off);
    updateRelay("51",data.relays.relay51val,data.relays.relay51on,data.relays.relay51off);
    updateRelay("52",data.relays.relay52val,data.relays.relay52on,data.relays.relay52off);
    updateRelay("53",data.relays.relay53val,data.relays.relay53on,data.relays.relay53off);
    updateRelay("54",data.relays.relay54val,data.relays.relay54on,data.relays.relay54off);
    updateRelay("55",data.relays.relay55val,data.relays.relay55on,data.relays.relay55off);
    updateRelay("56",data.relays.relay56val,data.relays.relay56on,data.relays.relay56off);
    updateRelay("57",data.relays.relay57val,data.relays.relay57on,data.relays.relay57off);
    updateRelay("58",data.relays.relay58val,data.relays.relay58on,data.relays.relay58off);
    updateATO('atolow',data.xml.ATOLOW);
    updateATO('atohigh',data.xml.ATOHIGH);
    updateATO('alarm',data.xml.ALARM);

    $("#T1Label").text("T1: " + data.xml.T1/10 + " degrees");
    $("#T1Bar").width(data.xml.T1/10+'%');
    $("#PHLabel").text("PH: " + data.xml.PH/100);
    $("#PHBar").width(data.xml.PH/10+'%');
    $("#SALLabel").text("SAL: " + data.xml.SAL/10);
    $("#SALBar").width(data.xml.SAL/10+'%');
    $("#RFSLabel").text("RFS: " + data.xml.RFS + "% / " + data.xml.C4 + "%");
    $("#RFSBar").width(data.xml.RFS+'%');
    $("#MainLabel").text("Lights: " + data.xml.PWME0 + '% / ' + data.xml.PWME1 + '% / ' + data.xml.PWME2 + '% / ' + data.xml.PWME3 + '%');
    $("#DCPumpLabel").text("DCPump: Sync: " + data.xml.PWME4 + '% / AntiSync: ' + data.xml.PWME5 + '%' );
    $("#WLBar").width(data.xml.WL+'%');
    $("#WLLabel").text("ATO: " + data.xml.WL + "%");
    $("#WLLabel2").text("Saltwater: " + data.xml.WL1 + "% / " + data.xml.WL2 + "%");
    $("#WLBar1").width(data.xml.WL1+'%');
    $("#WLBar2").width(data.xml.WL2+'%');
    $("#PWME0Bar").width(data.xml.PWME0+'%');
    $("#PWME1Bar").width(data.xml.PWME1+'%');
    $("#PWME2Bar").width(data.xml.PWME2+'%');
    $("#PWME3Bar").width(data.xml.PWME3+'%');
    $("#PWME4Bar").width(data.xml.PWME4+'%');
    $("#PWME5Bar").width(data.xml.PWME5+'%');
    $("#PWMALabel").text("Moonlights: " + data.xml.PWMA + "% / " + data.xml.PWMD + "%");
    $("#PWMALabel").text("Moonlights: " + data.xml.PWMA + "% / " + data.xml.PWMD + "%");
    $("#PWMABar").width(data.xml.PWMA+'%');
    $("#PWMDBar").width(data.xml.PWMD+'%');

    updateFishcam(); 
}

      function updateATO(id,value) {
        $("#"+id).attr("src",atoIMG(value));
      }
      
      function updateRelay(id,value,maskon,maskoff) {
        $("#relay"+id).attr("src",relayIMG(value,maskon,maskoff));
        $("#relay"+id).attr("data-cmd","r" + id + relayCMD(value,maskon,maskoff));
        
        $("#r"+id+"On").text('On');
        $("#r"+id+"Off").text('Off');
        $("#r"+id+"Auto").text('Auto');

        $("#r"+id+"On").css({
          color: relayButtonOnColor(maskon) }
                           );
        $("#r"+id+"Off").css({
          color: relayButtonOffColor(maskoff)}
                            );
        $("#r"+id+"Auto").css({
          color: relayButtonAutoColor(value)}
                             );
      }
      
      function relayButtonOnColor(value) {
        var str;
        if (value==1) {
          // relay is set for on
          str = "green";
        }
        else {
          str = "white";
        }
        return str;
      }
      
      function relayButtonOffColor(value) {
        var str;
        if (value==1) {
          // relay is set for on
          str = "white";
        }
        else {
          str = "red";
        }
        return str;
      }
      
      function relayButtonAutoColor(value) {
        var str;
        if (value==1) {
          // relay is set for on
          str = "green";
        }
        else {
          str = "red";
        }
        return str;
      }
      
      function atoIMG (value) {
        var str;
        if (value) {
          str = "images/green-led-on.png";
        } else {
          str = "images/red-led-on.png";
        }
        return str;
      }

      function relayIMG (value,maskon,maskoff) {
        var str;
        if (value==1) {
          // relay is set for on
          if (maskoff==1) {
            // maskoff is not set
            str = "images/green-led-on.png";
          }
          else {
            str = "images/green-led-off.png";
          }
        }
        else {
          // relay is set to off
          if (maskon==0) {
            // maskon is not set
            str = "images/red-led-off.png";
          }
          else {
            str = "images/red-led-on.png";
          }
        }
        return str;
      }
      
      function relayCMD (value,maskon,maskoff) {
        if (value==1) {
          // relay is set for on
          if (maskoff==1) {
            // maskoff is not set
            cmd=0;
            //turn off
          }
          else {
            cmd=2;
            // auto
          }
        }
        else {
          // relay is set to off
          if (maskon==0) {
            // maskoff is not set
            cmd=1;
            // turn on
          }
          else {
            cmd=2;
            // auto
          }
        }
        return cmd;
      }
 
    function updateFishcam() {
      var urlString=camURL+new Date().getTime();
      $("#fishcam").attr("src", urlString);
      $("#sumpcam").attr("src", sumpcamURL + "?abc=" + new Date().getTime());
    }

$(function() {
      allCacheData();
      drawWLGauge();
      drawPWMGauge();
      drawTempGauge();
      drawPHGauge();
      drawSpeedGauge();
      drawModeGauge();
      drawDurGauge();

      var timer;
      function getFishcam() {
      	updateFishcam();
        timer = setTimeout(getFishcam,500);
      } 

      $("#fishcam").click(function() {
        if( timer == null ) {
          timer = setTimeout(getFishcam, 500);
        } else {
          clearTimeout(timer);
          timer = null;
        }
      });
      
      $("form").submit(function(e) {
        e.preventDefault();
      });

    function allCacheData() {
      $.ajax({
          type: "POST",
          url: "all_data_json.php",
          dataType:'json', // add json datatype to get json
          data: ({
		urlvar: 'R99cache'
		}),
          success: function(data) {
    		refreshAllData(data);
          }	
          ,
          dataType: "json"
        });
      }

    function allData() {
      $.ajax({
          type: "POST",
          url: "all_data_json.php",
          dataType:'json', // add json datatype to get json
          data: ({
		urlvar: 'RAURL', 
		cmd: 'r99'}),
          success: function(data) {
    		refreshAllData(data);
          }	
          ,
          dataType: "json"
        });
      }

      $(".linkstabTab").click(function() {
	if(localStg) { localStorage.lastPage=this.id; }
      });

      $(".statustabTab").click(function() {
	if(localStg) { localStorage.lastPage=this.id; }
        var oldL = "Main";
	$(this).text('...').show();
	allData();
	$(this).text(oldL).show();
      });

      
      $(".chartstabTab").click(function() {
	if(localStg) { localStorage.lastPage=this.id; }
        $.ajax({
          type: "GET",
          url: 'charts.php',
          success: function(data) {
            // data is ur summary
            $('#chartstab').html(data);
            updateFishcam(); 
          }
        });
      });

      $(".controlstabTab").click(function(e) {
	if(localStg) { localStorage.lastPage=this.id; }
        var oldL = "Controls";
        feedback = $(this);
        feedback.text('...').show();

         $.ajax({
          type: "GET",
          url: 'controls.php',
          success: function(data) {
            // data is ur summary
            $('#controlstab').html(data);
            updateFishcam(); 
            feedback.text(oldL);
	    allData();
	}
        }); 
      });

	$(document).on("submit", ".ajax-form",function(e) {
//      $(".ajax-form").submit(function(e) {
        e.preventDefault();
        var cmd = $(this).attr('data-cmd');
      	var val = "";
        var val = $(this).find('[name=raVal]').val();
        
        $(this).find('.feedback').text('Saving...').show();
        
        // console.log(cmd);
        // console.log(val);
        // console.log("AJAX Mem");
        
        var that = this;
        $.ajax({
          type: "POST",
          url: "all_data_json.php",
          data: {
            urlvar: 'RAURL', 
            cmd: cmd, val: val }
          ,
          success: function(data) {
  			if (data.xml[0] == "OK") {
              $(that).find('.feedback').text('Saved successfully!');
  			}
            else {
              $(that).find('.feedback').text('There was an error.');
  			}
  			// console.log(data);
  			$(that).find('.feedback').delay(2500).fadeOut();
          }
          ,
          dataType: "json"
        });
      });
      
	$(document).on("click", ".ajax-button",function(e) {    
      	e.preventDefault();
        var cmd = $(this).attr('data-cmd');
        var val = $(this).val();
        var feedback = $(this).parent().find('.feedback');
        // console.log(feedback);
        
        var oldL = $(this).text();
        feedback = $(this);
        feedback.text('Saving...').show();
        
        
        // console.log(cmd);
        // console.log(val);
        // console.log("AJAX Mem");
        
        var that = this;
        $.ajax({
          type: "POST",
          url: "all_data_json.php",
          data: {
            urlvar: 'RAURL', 
            cmd: cmd, val: val }
          ,
          success: function(data) {
  			if (data.xml[0] != "ERR") {
              feedback.text('Saved!');
  			}
            else {
              feedback.text('There was an error.');
  			}
  			// console.log(data);
  			setTimeout(function() {
              feedback.text(oldL) }
                       ,2500);
          }
          ,
          dataType: "json"
        });
      });
      
      $(".relayToggle").click(function() {
	if(this.id=="RelayTab" || this.id=="phoneRelayTab") {
	  if(localStg) { localStorage.lastPage=this.id; }
	}

        var oldL = $(this).text();
        feedback = $(this);
        feedback.text('...').show();
        
        $.ajax({
          type: "POST",
          url: "all_data_json.php",
          data: {
            urlvar: 'RAURL', 
            cmd: $(this).attr("data-cmd"), 
            url: $(this).attr("url") }
          ,
          success: function(data) {
          $(".relaytabTab").text('Relays');
       	  refreshData(data);

		}
          ,
          dataType: "json"
        }
              );
      });     

      if (localStg) {
	if (localStorage.lastPage!='StatusTab' || localStorage.lastPage!='phoneStatusPage') { 
	  localStorage.currentPage=localStorage.lastPage;
	  // console.log(localStorage.currentPage);
	  // console.log(localStorage.lastPage);
	  console.log("Clicking #" + localStorage.lastPage);
	  $('#' + localStorage.lastPage).click();
	}
      }

    });
</script>
  
<script type="text/javascript">

var cacheStatusValues = [];
cacheStatusValues[0] = 'uncached';
cacheStatusValues[1] = 'idle';
cacheStatusValues[2] = 'checking';
cacheStatusValues[3] = 'downloading';
cacheStatusValues[4] = 'updateready';
cacheStatusValues[5] = 'obsolete';

var cache = window.applicationCache;
cache.addEventListener('cached', logEvent, false);
cache.addEventListener('checking', logEvent, false);
cache.addEventListener('downloading', logEvent, false);
cache.addEventListener('error', logEvent, false);
cache.addEventListener('noupdate', logEvent, false);
cache.addEventListener('obsolete', logEvent, false);
cache.addEventListener('progress', logEvent, false);
cache.addEventListener('updateready', logEvent, false);

function logEvent(e) {
var online, status, type, message;
online = (navigator.onLine) ? 'yes' : 'no';
status = cacheStatusValues[cache.status];
type = e.type;
message = 'online: ' + online;
message+= ', event: ' + type;
message+= ', status: ' + status;
if (type == 'error' && navigator.onLine) {
message+= ' (prolly a syntax error in manifest)';
}
console.log(message);
}

window.applicationCache.addEventListener(
'updateready',
function(){
  window.applicationCache.swapCache();
  console.log('swap cache has been called');
  if (confirm('A new version is available. Reload?')) {
    window.location.reload();
  }
},
false
);

// setInterval(function(){cache.update()}, 10000);

</script>

  <!-- Le javascript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="css/jquery.js">
  </script>
  <script src="css/bootstrap-transition.js">
  </script>
  <script src="css/bootstrap-alert.js">
  </script>
  <script src="css/bootstrap-modal.js">
  </script>
  <script src="css/bootstrap-dropdown.js">
  </script>
  <script src="css/bootstrap-scrollspy.js">
  </script>
  <script src="css/bootstrap-tab.js">
  </script>
  <script src="css/bootstrap-tooltip.js">
  </script>
  <script src="css/bootstrap-popover.js">
  </script>
  <script src="css/bootstrap-button.js">
  </script>
  <script src="css/bootstrap-collapse.js">
  </script>
  <script src="css/bootstrap-carousel.js">
  </script>
  <script src="css/bootstrap-typeahead.js">
  </script>
  </body>
  
</html>

