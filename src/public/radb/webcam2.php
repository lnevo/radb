<?php include('config.php'); ?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">

    
<style type="text/css">
	body {
		margin-top: 20px;
	}
	
/*	#fishcam { width: 64%; } */
	#fishcam_div { text-align: center;}
</style>
</head>

<body>

<!--  <div class="row-fluid"> 
    <div class="span12">
      <ul class="breadcrumb">
      <li><a class="active">Dash Board</a></li>
      </ul>
    </div>
  </div>
-->
<div class="container-fluid">
  <div class="row-fluid">
    <div id="fishcam_div" class="span12">
      <IMG SRC="<?= $GLOBALS['RACAM2']; ?>" id="fishcam">
      <!--<p>I'm in Section 1.</p>-->
    </div>
  </div>
</div> 







    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="css/jquery.js"></script>
    <script src="css/bootstrap-transition.js"></script>
    <script src="css/bootstrap-alert.js"></script>
    <script src="css/bootstrap-modal.js"></script>
    <script src="css/bootstrap-dropdown.js"></script>
    <script src="css/bootstrap-scrollspy.js"></script>
    <script src="css/bootstrap-tab.js"></script>
    <script src="css/bootstrap-tooltip.js"></script>
    <script src="css/bootstrap-popover.js"></script>
    <script src="css/bootstrap-button.js"></script>
    <script src="css/bootstrap-collapse.js"></script>
    <script src="css/bootstrap-carousel.js"></script>
    <script src="css/bootstrap-typeahead.js"></script>
</body>    
</html>

<script src="css/jquery.min.js"></script>
<script type="text/javascript">

	var timer;
	function getFishcam() {
		$("#fishcam").attr("src", "<?= $GLOBALS['RACAM2']; ?>");
		timer = setTimeout(getFishcam,500);
	}

	$(function() {

		$("#fishcam").click(function() {
			if( timer == null ) {
			  timer = setTimeout(getFishcam, 500);
			} else {
			  clearTimeout(timer); 
			  timer = null;
			}
		});
	
	});

</script>
</body>
</html>

