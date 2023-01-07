<?php include 'server/connection.php';

  $p_id= $_POST["id"];
	$totalv = $_POST['total'];
	
    
    $sql = "INSERT INTO `fetch_orderid`(`user`, `items`, `total`) VALUES($p_id,'Online', $totalv)";
	$result = mysqli_query($db,$sql);

	if($result == true){
		$select = "SELECT id FROM fetch_orderid ORDER BY id DESC LIMIT 1";
		$res = mysqli_query($db,$select);
		$id = mysqli_fetch_array($res);

	
	$success=mysqli_query($db,"SELECT count(*) FROM cart WHERE user='$p_id'");
	$rowcount = mysqli_num_rows($success);
	$select21 = mysqli_query($db,"SELECT * FROM cart WHERE user='$p_id'");
	
	if($rowcount > 0){
			
		while($row = mysqli_fetch_assoc($select21)){
			$rec_no=$id['id'];
			$name1=$row['name'];
            
			$price1=$row['price'];
			$qty1=$row['quantity'];
			$query1 = mysqli_query($db,"INSERT INTO `print_order` (`id`,`item_no`, `quantity`, `price`) VALUES($rec_no,$name1,$qty1,$price1)");
			
			 }
			 
			 mysqli_query($db,"update user set active='0' where username='$p_id'");
			 mysqli_query($db,"DELETE FROM `cart` WHERE USER='$p_id'");
			 
	}
	echo "success";
	}

	else{
		echo 'failure';
	}
