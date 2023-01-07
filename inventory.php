<?php 
include('top.php');
include('database.inc.php');

$sql0="SELECT product_id, count(*) FROM sales_product GROUP BY product_id ORDER BY count(*) DESC LIMIT 5";
$res1=mysqli_query($con,$sql0);

$sql1="SELECT * FROM fetch_orderid";
$select_rows1 = mysqli_query($con,$sql1);
$row_count1 = mysqli_num_rows($select_rows1);

$sql1="SELECT * FROM sales_product GROUP BY product_id  DESC LIMIT 5";
$res2=mysqli_query($con,$sql1);

?>

<div class="jumbotron p-4" style="width:50ch;height:35ch;">
  <h1 class="display-4">#Top Selling Products</h1>
  <ul class="list-group">
  <?php if(mysqli_num_rows($res1)>0){
    while($row1=mysqli_fetch_assoc($res1)){
        $names=$row1['product_id'];
        $sql10 = mysqli_query($con,"SELECT product_name FROM products WHERE product_no = $names");
  $result10= mysqli_fetch_assoc($sql10);
        ?>
  <li class="list-group-item"><?php echo $result10['product_name']?></li>
  <?php
    }
  }
  ?>
</ul>
<div class="jumbotron p-4" style="width:40ch;height:28ch;position: relative;left: 55ch;top:-31ch;">
  <h1 class="display-4">#Total Daily Sales Count</h1>
  <h1 class="display-2"style="width:50ch;height:35ch;position: relative;font-size: 130px;"><?php echo $row_count1 ?></h1>
 
</div>
</div>


<div class="jumbotron jumbotron-fluid  p-4" style="width:50ch;height:35ch;position: relative;top:-2ch;">
  <div class="container">
    <h1 class="display-4">#Inventory Settings</h1>
    <br> 
    <td> <a href="category.php"><button type="button" class="btn btn-success">Category</button></a></td>
<td> <a href="dish.php"><button type="button" class="btn btn-success">Dish</button></a></td>
<td> <a href="cxdetails.php"><button type="button" class="btn btn-success">Customer Details</button></a></td><br><br>
<td> <a href="feedback.php"><button type="button" class="btn btn-success">Products</button></a></td>
<td> <a href="dish.php"><button type="button" class="btn btn-success">Vegetables</button></a></td>
<td> <a href="dish.php"><button type="button" class="btn btn-success">Utensils</button></a></td>

  </div>
</div>
<div class="jumbotron p-4" style="width:50ch;height:35ch;position: relative;left: 55ch;top:-40ch;">
  <h1 class="display-4">#Last Five Orders</h1>
  <ul class="list-group">
  <?php
  
  
  if(mysqli_num_rows($res2)>0){
    while($row2=mysqli_fetch_assoc($res2)){
        $names=$row2['product_id'];
        $sql10 = mysqli_query($con,"SELECT product_name FROM products WHERE product_no = $names");
  $result10= mysqli_fetch_assoc($sql10);
        ?>
  <li class="list-group-item"><?php echo $result10['product_name']?></li>
  <?php
    }
  }
  ?>
</ul>
 
</div>



