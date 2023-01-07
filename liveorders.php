<?php
@include('top.php');
?>
     
     
     <div class="main-panel">
        
        <div class="content-wrapper">
     
        <div id="show1"></div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show1').load('live.php')
			}, 1000);
		});
	</script>
        
<?php


if(isset($_GET["action"]))
{
  
if($_GET["action"] == "accept")
{


$acept= $_GET["id"];

  $query = "UPDATE `confirmed` SET `action`='cancel'  WHERE `orderno`= $acept" ;
  $ans=mysqli_query($con,$query);


}
if($_GET["action"] == "rejected")
{

  $reje= $_GET["id"];

  $query = "UPDATE `confirmed` SET `action`='Delievered'  WHERE `orderno`= $reje";
  $ans=mysqli_query($con,$query);
  
}

if($_GET["action"] == "cancel")
{

  $serv= $_GET["id"];
$user=$_GET["user"];
  $query = "DELETE FROM `confirmed` WHERE `orderno`= $serv AND  `user`= $user";
  $ans=mysqli_query($con,$query);
  $query="";
  

}
}


?>
<?php include('footer.php');?>