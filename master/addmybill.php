<?php include 'server/connection.php';

  $p_id= $_POST["id"];
	$totalv = $_POST['total'];
	
    
    $sql = "INSERT INTO sales(customer_id,username,discount,total,print) VALUES($p_id,'admin',1, $totalv,1)";
	$result = mysqli_query($db,$sql);

	if($result == true){
		$select = "SELECT reciept_no FROM sales ORDER BY reciept_no DESC LIMIT 1";
		$res = mysqli_query($db,$select);
		$id = mysqli_fetch_array($res);

	
	$success=mysqli_query($db,"SELECT count(*) FROM cart WHERE user='$p_id'");
	$rowcount = mysqli_num_rows($success);
	$select21 = mysqli_query($db,"SELECT * FROM cart WHERE user='$p_id'");
	
	if($rowcount > 0){
			
		while($row = mysqli_fetch_assoc($select21)){
			$rec_no=$id['reciept_no'];
			$name1=$row['name'];
			$price1=$row['price'];
			$qty1=$row['quantity'];
			$query1 = mysqli_query($db,"INSERT INTO `sales_product` (reciept_no,product_id,price,qty) VALUES($rec_no,$name1,$price1,$qty1)");
			
			 }
			 
			 
	}
	echo "success";
	}

	else{
		echo 'failure';
	}
