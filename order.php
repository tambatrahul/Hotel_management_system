<?php 
include('top.php');
?>
<div id="show"></div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show').load('orderload.php')
			}, 1000);
		});
	</script>


        
<?php include('footer.php');?>