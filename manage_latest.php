<?php 
include('top.php');
$msg="";
$latest="";
$path="";
$price="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from latest where id='$id'"));
	$latest=$row['name'];
	$path=$row['path'];
    $price=$row['price'];
}

if(isset($_POST['submit'])){
	$latest=get_safe_value($_POST['name']);
	$path=get_safe_value($_POST['path']);
    $price=get_safe_value($_POST['price']);
	
	if($id==''){
		$sql="select * from latest where name='$latest'";
	}else{
		$sql="select * from latest where name='$latest' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="latest already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into latest(name,path,price,status) values('$latest','$path',$price,'1')");
		}else{
			mysqli_query($con,"update latest set name='$latest', path='$path',price='$price' where id='$id'");
		}
		
		redirect('latest.php');
	}
}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage latest</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" placeholder="Product Name" name="name" required value="<?php echo $latest?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Path</label>
                      <input type="textbox" class="form-control" placeholder="path" name="path"  value="<?php echo $path?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Price</label>
                      <input type="textbox" class="form-control" placeholder="price" name="price"  value="<?php echo $price?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>