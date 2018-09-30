<?php include('utils.php'); ?>
<?php include('all_data.php'); ?>
<?php include('ra_labels.php'); ?>

        <div class="accordion" id="accordion" style="display:inline;">
      
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse01">
                <h5>Maintenance</h5>
              </a>
            </div>
            <div id="collapse01" class="accordion-body collapse">
              <div class="accordion-inner">
              	<form class="form-inline">
              	  <?= ajaxButton("FeedingMode","Feed","mf",""); ?>
               	  <?= ajaxButton("WCMode","WC Mode","mw",""); ?>
               	  <?= ajaxButton("CancelMode","Cancel","bp",""); ?>
                </form>
              	<form class="form-inline">
              	  <?= ajaxButton("clearATO","Clear ATO Timeout","mt",""); ?>
              	  <?= ajaxButton("clearOH","Clear Overheat","mo",""); ?>
              	</form>
  
            		ATO level: <b><?php echo $WL; ?>%</b>
            		Usage: <b><?php echo $CustomVar[6]; ?>%</b><br>
          		  Days Remaining: <b><?php echo $CustomVar[6]>0?round(($WL-10) / $CustomVar[6]):"INF"; ?></b>
          		  Last Filled: <b><?php echo $Mem_B_MaintATO; ?></b>
			          <p>
            		<h5>Days since: </h5>
  			        Last Feeding: <b><?php echo $Mem_B_MaintFeeding; ?></b>
  			        <br>
           		  Skimmer Cleaned: <b><?php echo $Mem_B_MaintSkimmer; ?></b>
  			        <br>
            		Refill: [
          		  ATO: <b><?php echo $Mem_B_MaintATO; ?></b>
            		Calcium: <b><?php echo $Mem_B_MaintCal; ?></b>
            		Alk: <b><?php echo $Mem_B_MaintAlk; ?></b>
            		Vinegar: <b><?php echo $Mem_B_MaintVinegar; ?></b>
            		]<br>
            		Filter: [ 
            		Carbon: <b><?php echo $Mem_B_MaintGAC; ?></b>
            		GFO: <b><?php echo $Mem_B_MaintGFO; ?></b>
           		  Sock: <b><?php echo $Mem_B_MaintSocks; ?></b>
  			        ]<br>
              	<p>
              	<form class="form-inline">
                <?= ajaxButton("resetGAC","Replace Carbon","mb144","0"); ?>
                <?= ajaxButton("resetGFO","Replace GFO","mb145","0"); ?>
                <p><p>
                <?= ajaxButton("resetCal","Refill Cal","mb146","0"); ?>
                <?= ajaxButton("resetAlk","Refill Alk","mb147","0"); ?>
                <?= ajaxButton("resetVinegar","Refill Vinegar","mb177","0"); ?>
                <p>
                <?= ajaxButton("resetSkimmer","Clean Skimmer","mb151","0"); ?>
                <p>
                <?= ajaxButton("resetSock","Change Filter Sock","mb152","0"); ?>			
                </form>
              </div>
            </div>
          </div>  
          
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse02">
                <h5>ATO</h5>
              </a>
            </div>
            <div id="collapse02" class="accordion-body collapse">
              <div class="accordion-inner">
            		ATO level: <b><?php echo $WL; ?>%</b>
            		Usage: <b><?php echo $CustomVar[6]; ?>%</b><br>
          		  Days Remaining: <b><?php echo round(($WL-10) / $CustomVar[6]); ?></b>
          		  Last Filled: <b><?php echo $Mem_B_MaintATO; ?></b>
			          <p>
              	<form class="form-inline">
               	  <?= ajaxButton("RefillATOOn","Start ATO Refill","r311",""); ?>
               	  <?= ajaxButton("RefillATOOff","Stop ATO Refill","r312",""); ?>
  		          </form>
             	  <?= ajaxForm("ATO Rate Alarm","RateAlarmAjax","setRateAlarmAjax",$Mem_B_RateAlarm,"mb142"); ?>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse02a">
                <h5>Water Change</h5>
              </a>
            </div>
            <div id="collapse02a" class="accordion-body collapse">
              <div class="accordion-inner">
            	<form class="form-inline">
            	  <?= ajaxButton("startWC","Enable ATO","r321",""); ?>
            	  <?= ajaxButton("startFill","Start Filling","r331",""); ?>
            	  <?= ajaxButton("stopWC","Disable ATO","r322",""); ?>
		  
            	</form>
             	  <?= ajaxForm("Fill Time","WCFillTimeAjax","setWCFillTimeAjax",$Mem_I_WCFillTime,"mi106"); ?>
              </div>
            </div>
          </div>
        
        
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse03">
                <h5>RF Control</h5>        
              </a>
            </div>
            <div id="collapse03" class="accordion-body collapse">
              <div class="accordion-inner">  
      		Current Speed: <b><?php echo $CustomVar[4]; ?>%</b><p>
      		<?= echoModes($Mem_B_RFMode); ?>
      		<?= ajaxForm("Speed","RFSpeed","setSpeed",$Mem_B_RFSpeed,"mb256"); ?>
                <?= ajaxForm("Anti-Sync %","PumpOffset","setPumpOffset",$Mem_B_PumpOffset,"mb119"); ?>
        	<?= ajaxForm("Duration","RFDuration","setDuration",$Mem_B_RFDuration,"mb257"); ?>

      		<h5>Custom Settings</h5>
            		<form class="form-inline">	
			<div class="btn-group">
              <?= ajaxButton("RandomTideOn","Random Tide On","mb168","1"); ?>
              <?= ajaxButton("RandomTideOff","Random Tide Off","mb168","0"); ?>
            </div>
           	Currently: <?= memStatus($Mem_B_RandomMode); ?>
					</form>
      		<?= echoTideModes($Mem_B_TideMode); ?>
       		<?= ajaxForm("Min Offset %","MinTide","setMinTide",$Mem_B_TideMin,"mb117"); ?>
       		<?= ajaxForm("Max Offset %","MaxTide","setMaxTide",$Mem_B_TideMax,"mb118"); ?>	
       		<?= ajaxForm("Gyre Offset %","GyreOffset","setGyreOffset",$Mem_B_GyreOffset,"mb169"); ?>	
              </div>
            </div>
          </div>
        
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse04">
                <h5>RF Program Settings</h5>
              </a>
            </div>
            <div id="collapse04" class="accordion-body collapse">
              <div class="accordion-inner">
            		<form class="form-inline">
                <div class="btn-group">
              		<?= ajaxButton("FeedRFOn","Feed Mode On","mb120",1); ?>
            	  	<?= ajaxButton("FeedRFOff","Feed Mode Off","mb120",0); ?>	
            		</div>
            	  	Currently: <?= memStatus($Mem_B_FeedingRF); ?>
		  
            		</form>
            		
            		<?= ajaxForm("NTM Speed","NTMSpeed","setNTMSpeed",$Mem_B_NTMSpeed,"mb124"); ?>
            		<?= ajaxForm("NTM Duration","NTMDuration","setNTMDuration",$Mem_B_NTMDuration,"mb125"); ?>
            		<?= ajaxForm("NTM Delay","NTMDelay","setNTMDelay",$Mem_B_NTMDelay,"mb126"); ?>
            		<?= ajaxForm("NTM Runtime","NTMRuntime","setNTMRuntime",$Mem_B_NTMTime,"mb127"); ?>
            	
            		<form class="form-inline">	
            	  <div class="btn-group">
                    <?= ajaxButton("NightRFOn","Night Mode On","mb121","1"); ?>
            	    <?= ajaxButton("NightRFOff","Night Mode Off","mb121","0"); ?>
            	  </div>
            	  	Currently: <?= memStatus($Mem_B_NightRF); ?>
		  
            		</form>
            		<?= ajaxForm("Night Speed","NightSpeed","setNightSpeed",$Mem_B_NightSpeed,"mb122"); ?>
            		<?= ajaxForm("Night Duration","NightDuration","setNightDuration",$Mem_B_NightDuration,"mb123"); ?>

					Mode Settings:
            		<?= ajaxForm("Feeding Speed","FeedingSpeed","setFeedingSpeed",$Mem_B_FeedingSpeed,"mb172"); ?>
            		<?= ajaxForm("WaterChange Speed","WCSpeed","setWCSpeed",$Mem_B_WCSpeed,"mb173"); ?>
              </div>
            </div>
          </div>
          
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse05">
                <h5>Lighting</h5>
              </a>
            </div>
            <div id="collapse05" class="accordion-body collapse">
              <div class="accordion-inner">
      		  Sunrise: <b><?php echo $Mem_B_StdLightsOnHour-($Mem_B_ActinicOffset/60) . ':' . $Mem_B_StdLightsOnMinute; ?></b><br>
      		  Sunset: <b><?php echo $Mem_B_StdLightsOffHour+($Mem_B_ActinicOffset/60) . ':' . $Mem_B_StdLightsOffMinute; ?></b><br>
      		  MoonPhase: <b><?php echo $Mem_B_PWMSlopeEndD . '%'; ?></b><P>
                	<h5>Dimming Overrides</h5>
            		<?= ajaxForm("Ch0 - " . $PWME0 . "%","Channel0Override","setChannel0Override",$PWME0O,"po2"); ?>
            		<?= ajaxForm("Ch1 - " . $PWME1 . "%","Channel1Override","setChannel1Override",$PWME1O,"po3"); ?>
            		<?= ajaxForm("Ch2 - " . $PWME2 . "%","Channel2Override","setChannel2Override",$PWME2O,"po4"); ?>
            		<?= ajaxForm("Ch3 - " . $PWME3 . "%","Channel3Override","setChannel3Override",$PWME3O,"po5"); ?>
            		<?= ajaxForm("AP - " . $PWMA . "%","ActinicOverride","setActinicOverride",$PWMAO,"po0"); ?>
            		<?= ajaxForm("DP - " . $PWMD . "%","DaylightOverride","setDaylightOverride",$PWMDO,"po1"); ?>
                	<h5>Dimming Settings</h5>
					0 - Slope, 1 - Parabola, 2 - SmoothRamp, 3 - Sigmoid
        		    <?= ajaxForm("Light Mode","LightMode","setLightMode",$Mem_B_LightMode,"mb160"); ?>
        		    <?= ajaxForm("Moon Mode","MoonMode","setMoonMode",$Mem_B_MoonMode,"mb170"); ?>
            		<?= ajaxForm("LightsOff %","LightsOffPerc","setLightsOffPerc",$Mem_B_LightsOffPerc,"mb171"); ?>
        		    <?= ajaxForm("Main E/W Offset","LightOffset","setLightOffset",$Mem_B_LightOffset,"mb161"); ?>
        		    <?= ajaxForm("Moon E/W Offset","MoonOffset","setMoonOffset",$Mem_B_MoonOffset,"mb100"); ?>
					<p>
                	<h5>Acclimation</h5>
        	    	<?= ajaxForm("Days","AcclDay","setAcclDay",$Mem_B_AcclDay,"mb114"); ?>
        	    	<?= ajaxForm("Rise Offset","AcclRiseOffset","setAcclRiseOffset",$Mem_B_AcclRiseOffset,"mb112"); ?>
        	    	<?= ajaxForm("Set Offset","AcclSetOffset","setAcclSetOffset",$Mem_B_AcclSetOffset,"mb113"); ?>
        	    	<?= ajaxForm("Actinic Offset x/100 %","AcclActinicOffset","setAcclActinicOffset",$Mem_B_AcclActinicOffset,"mb166"); ?>
        	    	<?= ajaxForm("Daylight Offset x/100 %","AcclDaylightOffset","setAcclDaylightOfffset",$Mem_B_AcclDaylightOffset,"mb167"); ?>
                	<h5>GPS</h5>
        	    	<?= ajaxForm("Rise Offset","RiseOffset","setRiseOffset",$Mem_I_RiseOffset,"mi162"); ?>
        	    	<?= ajaxForm("Set Offset","SetOffset","setSetOffset",$Mem_I_SetOffset,"mi164"); ?>
            		<?= ajaxForm("Latitude","Latitude","setLatitude",$Mem_I_Latitude,"mi108"); ?>
            		<?= ajaxForm("Longitude","Longitude","setLongitude",$Mem_I_Longitude,"mi110"); ?>
              </div>
            </div>
          </div>
        
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse06">
                <h5>Vacation Control</h5>
              </a>
            </div>
            <div id="collapse06" class="accordion-body collapse">
              <div class="accordion-inner">
            		<form class="form-inline">
                <div class="btn-group">
              		<?= ajaxButton("VacationOn","Vacation On","mb101","1"); ?>
            	  	<?= ajaxButton("VacationOff","Vacation Off","mb101","0"); ?>
                </div>
            	  	Currently: <?= memStatus($Mem_B_Vacation); ?>
            	  	<p>
                <div class="btn-group">
            		  <?= ajaxButton("AutoFeedOn","AutoFeed On","mb102","1"); ?>
            		  <?= ajaxButton("AutoFeedOff","AutoFeed Off","mb102","0"); ?>
                </div>
            	  	Currently: <?= memStatus($Mem_B_AutoFeed); ?>
            		</form>
    <?= ajaxForm("AutoFeed Presses","AutoFeedPress","setAutoFeedPress",$Mem_B_AutoFeedPress,"mb103"); ?>
    <?= ajaxForm("AutoFeed Repeat","AutoFeedRepeat","setAutoFeedRepeat",$Mem_B_AutoFeedRepeat,"mb104"); ?>
    <?= ajaxForm("AutoFeed Offset","AutoFeedOffset","setAutoFeedOffset",$Mem_B_AutoFeedOffset,"mb105"); ?>
            		<h5>Feedings today: <?php echo $CustomVar[0]; ?></h5>
              </div>
            </div>
          </div>
        
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse07">
                <h5>Swabbie Control</h5>
              </a>
            </div>
            <div id="collapse07" class="accordion-body collapse">
              <div class="accordion-inner">  
            		<?= ajaxForm("Swabbie Repeat","SwabbieRepeat","setSwabbieRepeat",$Mem_B_SwabbieRepeat,"mb115"); ?>
            		<?= ajaxForm("Swabbie Runtime","SwabbieRuntime","setSwabbieRuntime",$Mem_B_SwabbieTime,"mb116"); ?>  
              </div>
            </div>
          </div>
        
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse08">
                <h5>Dosing Pumps</h5>
              </a>
            </div>
            <div id="collapse08" class="accordion-body collapse">
              <div class="accordion-inner">  
            		<?= ajaxForm("DP1 Volume","DP1Volume","setDP1Volume",$Mem_I_DP1Volume,"mb132"); ?>
             		<?= ajaxForm("DP1 Time","DP1Time","setDP1Time",$Mem_B_DP1Timer,"mb212"); ?>
            		<h5>DP1 dosed today: <?php echo $CustomVar[1]; ?> units</h5>
             		<?= ajaxForm("DP2 Volume","DP2Volume","setDP2Volume",$Mem_I_DP2Volume,"mb138"); ?>
            		<?= ajaxForm("DP2 Time","DP2Time","setDP2Time",$Mem_B_DP2Timer,"mb213"); ?>
            		<h5>DP2 dosed today: <?php echo $CustomVar[2]; ?> units</h5>
             		<?= ajaxForm("DP3 Volume","DP3Volume","setDP3Volume",$Mem_I_DP3Volume,"mb158"); ?>
            		<?= ajaxForm("DP3 Time","DP3Time","setDP3Time",$Mem_B_DP3Timer,"mb333"); ?>
            		<h5>DP3 dosed today: <?php echo $CustomVar[3]; ?> units</h5>
                <form>
            		<?= ajaxButton("UnlockPorts","Unlock Ports","r380",""); ?>
            		<?= ajaxButton("CalibrateDP","Begin Calibration","r371",""); ?>  
            		<?= ajaxButton("LockPorts","Cancel Changes","r382",""); ?>  
            		<?= ajaxButton("CalibrateDPEnd","Save Calibration","r372",""); ?>  
		  
            		</form>
            		<?= ajaxForm("DP1 Calibrate Volume","CalDP1Vol","setCalDP1Vol",$Mem_I_CalDP1Vol,"mi128"); ?>
            		<?= ajaxForm("DP1 Calibrate Time","CalDP1Time","setCalDP1Time",$Mem_I_CalDP1Time,"mi130"); ?>
            		<h5>DP1 rate: <?php echo number_format(($Mem_I_CalDP1Vol / $Mem_I_CalDP1Time * 60),2); ?> ml/min</h5>
            		<?= ajaxForm("DP2 Calibrate Volume","CalDP2Vol","setCalDP2Vol",$Mem_I_CalDP2Vol,"mi134"); ?>
            		<?= ajaxForm("DP2 Calibrate Time","CalDP2Time","setCalDP2Time",$Mem_I_CalDP2Time,"mi136"); ?>
            		<h5>DP2 rate: <?php echo number_format(($Mem_I_CalDP2Vol / $Mem_I_CalDP2Time * 60),2); ?> ml/min</h5>
            		<?= ajaxForm("DP3 Calibrate Volume","CalDP3Vol","setCalDP3Vol",$Mem_I_CalDP3Vol,"mi154"); ?>
            		<?= ajaxForm("DP3 Calibrate Time","CalDP3Time","setCalDP3Time",$Mem_I_CalDP3Time,"mi156"); ?>
            		<h5>DP3 rate: <?php echo number_format(($Mem_I_CalDP3Vol / $Mem_I_CalDP3Time * 60),2); ?> ml/min</h5>
              </div>
            </div>
          </div>
         
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse09">
                <h5>Override Masks</h5>
              </a>
            </div>
            <div id="collapse09" class="accordion-body collapse">
              <div class="accordion-inner">
            		<form class="form-inline">
                <div class="btn-group">
              		<?= ajaxButton("LockPorts","Lock Ports","r382",""); ?>
            	  	<?= ajaxButton("UnlockPorts","Unlock Ports","r380",""); ?>
                </div>
		  
            		</form>  
              </div>
            </div>
          </div>
        
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                <h5>Memory</h5>
              </a>
            </div>
            <div id="collapse10" class="accordion-body collapse">
              <div class="accordion-inner">
			<button class="btn" type=submit value="r99btn" onclick="location.href='r99_format.php';">Get R99 Data</button>
              		<?= ajaxButton("ResetMemory","Reset Memory","mb199","1"); ?>
					<P>
              		<?= ajaxButton("RebootCtrl","Reboot Conroller","boot",""); ?>
		<div id="r99content">
		</div>
              </div>
            </div>
          </div>
        </div>
