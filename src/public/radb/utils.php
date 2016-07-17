<?php

	function collapse($id, $label) {
		$str = <<<EOD
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#${id}">
                <h5>{$label}</h5>
              </a>
            </div>
            <div id="{$id}" class="accordion-body collapse">
              <div class="accordion-inner">
              </div>
            </div>
	  </div>
EOD;
	return $str;
}

	function ajaxForm($label,$input,$button,$value,$cmd) {
		$str = <<<EOD
		
<form class="form-horizontal ajax-form" data-cmd="{$cmd}">
	<div class="control-group">
		<label class="control-label" for="{$input}">{$label}</label>
		<div class="controls">
			<div class="input-append">
				<input type="text" name="raVal" value="{$value}" class="input-medium" id="{$input}">
				<button class="btn" id="{$button}" type=submit>Set</button>
			</div>
			<span class="feedback"></span>
		</div>
	</div>
</form>		
		
EOD;

		return $str;
	}


	function inlineForm($label,$input,$button,$value) {
		$str = <<<EOD
		
<form class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="{$input}">{$label}</label>
		<div class="controls">
			<div class="input-append">
				<input type="text" value="{$value}" class="input-medium" id="{$input}">
				<button class="btn" id="{$button}">Set</button>
			</div>
		</div>
	</div>
</form>		
		
EOD;

		return $str;
	}

	function button($id,$label) {
		$str = <<<EOD
		
	<button class="btn" id="{$id}">{$label}</button>
		
EOD;

		return $str;
	}
	
function ajaxButton($id,$label,$cmd,$value) {
	$str = <<<EOD
	<button class="btn ajax-button" type=submit data-cmd="{$cmd}" value="{$value}" id="{$id}">{$label}</button>
EOD;
	return $str;
}

function relayButton($id,$label,$cmd,$value) {
	$str = <<<EOD
	<button class="btn relayToggle" type=submit data-cmd="{$cmd}" value="{$value}" id="{$id}">{$label}</button>
EOD;
	return $str;
}

	function optionSelect($label,$value,$test) {
    $str = "<option value='" . $value . "'>" . $label;
    if($test=='$value') 
      $str=$str . " selected='selected' </option>";
    else 
      $str=$str . "</option>";

    return $str;
  }
  
  function memStatus($status) {
    $str = "OFF";
    if ($status)
    $str = "ON";
    
   return $str;
   // return $status;
  }

  function progressBar($value) {
    echo "<div class=\"progress\" >";
    echo  "<div class=\"bar\" style=\"width: " . $value . "%;\"></div>";
    echo "</div>";
  
  }

  function switchStatus($value,$id) {
    if ($value!=0)
      $str = "images/green-led-on.png";
    else
      $str = "images/red-led-on.png";

    $str = "<img src=\"" . $str . "\" id=\"" . $id . "\"/>";
    return $str;    
  }

  function relayLED($id,$value,$status) {
    if ($value==1) {
      if ($status==0) {
        $str = "images/green-led-off.png";
      } else {
      	 $str = "images/green-led-on.png";
      }
    } else {
      if ($status==0) {
         $str = "images/red-led-off.png";
      } else { 
         $str = "images/red-led-on.png";
      }
    }

    if ($value==0) {
      if ($status==0) {
        $cmd=1;
      } else {
        $cmd=2;
      }
    } else {
      if ($status==0) {
        $cmd=2;
      } else {
        $cmd=0;
      }
    }

    $str = "<img src=\"" . $str . "\" class=\"relayToggle relayLED\" id=\"relay" . $id . "\" data-cmd=\"r" . $id . $cmd . "\" />";
    return $str;    
  }

  function echoTideModes($mode) {
  
  $values = array("ReefCrest"=>"0",
                  "TidalSwell"=>"1",
                  "Smart_NTM"=>"2",
                  "Lagoon"=>"3",
                  "Short Pulse"=>"4",
                  "Long Pulse"=>"5",
                  "BHazard"=>"6",
                  "Else"=>"7",
                  "Sine"=>"8",
                  "Constant"=>"9"
  );     

$str = <<<EOD

			<form class="form-horizontal ajax-form" data-cmd="mb143">
			<div class="control-group">
				<label class="control-label">Tide Mode</label>
				<div class="controls">
					<select name="raVal" id="TideMode" class="input-medium">
EOD;
  echo $str;
	foreach ($values as $key => $value) {
		echo "<option value=\"" . $value . "\"";
		if ( $value == $mode ) {
			echo " SELECTED";
		}
		echo ">" . $key . "</option>\n";
	}
  $str = <<<EOD
					</select>
					<button class="btn" id="setTideMode">Set</button>
			<span class="feedback"></span>
				</div>
			</div>
		</form>
EOD;
  echo $str;
  }


  function echoModes($mode) {
  
  $values = array("Constant"=>"0",
			"Lagoon"=>"1",
      "Reef Crest"=>"2",
      "Short Pulse"=>"3",
      "Long Pulse"=>"4",
      "Smart NTM"=>"5",
      "Tidal Swell"=>"6",
      "Feeding"=>"7",
      "Night"=>"9",
      "Storm"=>"10",
      "Custom"=>"11",
      );     

$str = <<<EOD

			<form class="form-horizontal ajax-form" data-cmd="mb255">
			<div class="control-group">
				<label class="control-label">Mode</label>
				<div class="controls">
					<select id="rfmode" name="raVal" class="input-medium">
EOD;
  echo $str;
	foreach ($values as $key => $value) {
		echo "<option value=\"" . $value . "\"";
		if ( $value == $mode ) {
			echo " SELECTED";
		}
		echo ">" . $key . "</option>\n";
	}
  $str = <<<EOD
					</select>
					<button class="btn" id="setMode">Set</button>
			<span class="feedback"></span>
				</div>
			</div>
		</form>
EOD;
  echo $str;
  }


  function readByte($position,$string) {
    $position*=2;
    $answer="";
    for($i=$position;$i<$position+2;$i++) {
      $answer=$answer . $string[$i];
    }
    return hexdec($answer);
  }

  function readInt($position,$string) {
    $position*=2;
    $answer="";
    
    // Read first byte
    for($i=$position+2;$i<$position+4;$i++) {
      $answer=$answer . $string[$i];
    }
    // Read second byte
    for($i=$position;$i<$position+2;$i++) {
      $answer=$answer . $string[$i];
    }
    
    $answer=hexdec($answer);
    
    // handle negatives
    if ($answer>65536/2)
      $answer-=65536;
      
    return $answer;
  }
  
	
?>

