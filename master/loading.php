<div id="show1"></div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show1').load('print.php')
			}, 500);
		});
	</script>