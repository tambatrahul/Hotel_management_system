<?php 
include('top.php');
$name="";
$category="";
$price="";
$path="";


if(isset($_POST['submit'])){
$name =get_safe_value($_POST['name']);
$category =get_safe_value($_POST['category']);
$price =get_safe_value($_POST['price']);
$path =get_safe_value($_POST['path']);
$status =get_safe_value($_POST['status']);

mysqli_query($con,"INSERT into food(name,category,price,path,status) VALUES('" . $name . "','" . $category . "','" . $price . "','" . $path . "','" . $status . "')");
$did=mysqli_insert_id($con);

}



?>
<div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="category"value="VADA" name="category" placeholder="Food category" required="">
          </div>     
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Food name" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Food Price (INR)" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="status" value="1" name="status" placeholder="Status" required="">
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control" id="path"value="images/VADA/1.jpg" name="path" placeholder="Food Image Path [images/<filename>.<extention>]" required="">
          </div>

          <div class="form-group">
          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> ADD FOOD </button>    
      </div>
        </form>

        
        </div>
      
    </div>
<?php include('footer.php');?>