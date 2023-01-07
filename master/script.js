<?php 

if(isset($_GET["action"]))
		  {
			
		 if($_GET["action"] == "pos")
		 {
			$p_id= $_GET["id"];

	include('server/connection.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	$added = isset($_GET['added']);
	$error = isset($_GET['error']);
	$undelete = isset($_GET['undelete']);
	$updated = '';
	$deleted = '';
	$failure = isset($_GET['failure']);
	
	$query 	= "SELECT * FROM `customer`";
	$show	= mysqli_query($db,$query);
	if(isset($_SESSION['username'])){
		$user = $_SESSION['username'];
		$sql = "SELECT position FROM users WHERE username='$user'";
		$result	= mysqli_query($db, $sql);
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('templates/head.php'); ?>
</head>
<body>
	<div class="h-100 bg-dark" id="container">
		<div id="header">
			<?php include('alert.php'); ?>
			<div>
				<img class="img-fluid m-2 w-100" style="height:14ch;width:1px;"src="images/logo1.jpg"/>
			</div>
			<div class="text-white mt-0 ml-5">
				<table class="table-responsive-sm">
					<tbody>
						<tr>
							<td valign="baseline"><small>User Logged on:</small></td>
							<td valign="baseline"><small><p class="pt-3 ml-5"><i class="fas fa-user-shield"></i> <?php echo $row['position'];}}}?></p></small></td>
						</tr>
						<tr>
							<td valign="baseline"><small class="pb-1">Date:</small></td>
							<td valign="baseline"><small><p class="p-0 ml-5"><i class="fas fa-calendar-alt">&nbsp</i><span id='time'></span></p></small></td>
						</tr>
						<tr>
							<td valign="baseline"><small class="mt-5">Table No:</small></td>
							<td valign="baseline"><small><div class="content p-0 ml-5"><input type="text" value="<?php echo $p_id ?>"class="form-control form-control-sm customer_search" autocomplete="off" data-provide="typeahead" id="customer_search" placeholder="Customer Search" name="customer"/></small></div>
							</td>
							</tr>
					</tbody>
				</table>
			</div>
			<?php
			$select = "SELECT image FROM cart WHERE user='$p_id' ORDER BY id DESC LIMIT 1";
			$res = mysqli_query($db,$select);
			if (mysqli_num_rows($res) > 0){
				$tv = mysqli_fetch_array($res);
				$totalv=$tv['image'];
			}
			else {
				$totalv=0;
			}
			?>
			<div class="header_price border p-0">
				<h5>Grand Total</h5>
				<p class="pb-0 mr-2" style="float: right; font-size: 40px;" id="totalValue">Rs. <?php echo $totalv?>.00</p>
			</div>
		</div>
		<div id="content" class="mr-2">
			<div id="price_column" class="m-2 table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar-a">
				<form method="POST" action="">
				<table class="table-striped w-100 font-weight-bold" style="cursor: pointer;" id="table2">
					<thead>
						<tr class='text-center'>
						<th>Barcode</th>
							<th>Description</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Sub.Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
					$sql = "SELECT * FROM cart WHERE user='$p_id'";
		$result	= mysqli_query($db, $sql);

		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$names=$row['name'];
				$sql10 = mysqli_query($db,"SELECT product_name FROM products WHERE product_no = $names");
				$result10= mysqli_fetch_assoc($sql10);
			?>
			<tr class='prd'>
			<td class='totalPrice text-center'><?php echo $names ?></td>
				<td class='text-center'><?php echo $result10['product_name'] ?></td>
				<td class='price text-center'><?php echo $row['price']?></td>
				<td class='qty text-center'><?php echo $row['quantity']?></td>
				<td class='totalPrice text-center'><?php echo $row['image']?></td>
				<td class='text-center p-1'>
				<button class='btn btn-danger btn-sm' type='button' id='delete-row'><i class='fas fa-times-circle'></i></button>
				<tr>
						<?php
					}
					}
					?>
					<tbody id="tableData">
					</tbody>
				</table>
				</form>
			</div>
			<div id="table_buttons">
				<button id="buttons" type="button" name='enter' class="Enter btn btn-secondary border ml-2"><i class="fas fa-handshake"></i> Bill</button>
				<div class="">
				<small>
					<ul class="text-white justify-content-center">
						<li class="d-flex mb-0">Total (Rs.): <p id="totalValue1" class="mb-0 ml-5 pl-3">0.00</p></li>
						<li class="mb-0 mt-0">Discount (Rs.): <input style="width: 100px" class="text-right form-control-sm" type="number" name="discount" value="0" min="0" placeholder="Enter Discount" id="discount" ></li>
					</ul>
				</small>
				</div>
			</div>
		</div>
		<div id="sidebar">
			<div class="mt-1 ">
			<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span></div>
   				<input class="form-control" type="text" placeholder="Product Search" aria-label="Search" id="search" name="search" onkeyup="loadproducts();"/>
   			</div></div>
			<div id="product_area" class="table-responsive-sm mt-2 table-wrapper-scroll-y my-custom-scrollbar" >
				<table class="w-100 table-striped font-weight-bold" style="cursor: pointer;" id="table1">
					<thead>
						<tr claclass='text-center'><b>
							<td>Barcode</td>
							<td>Product Name</td>
							<td>Price</td>
							
						</tr></b>
						<tbody id="products">
							
						</tbody>
					</thead>
				</table>
			</div>
			<div class="w-100 mt-2" id="enter_area">
				<button id="buttons" type="button" class="cancel btn btn-secondary border"><i class="fas fa-ban"></i> Cancel</button>
			</div>
		</div>
		<div id="footer" class="w-100">
		<button id="buttons" type="button" name='save' class="Save btn btn-secondary border ml-2"><i class="fas fa-handshake"></i> Save</button>	<button id="buttons" name="logout" type="button" onclick="out();" class="logout btn btn-danger border mr-2"><i class="fas fa-sign-out-alt"></i> Logout</button> 
		</div>
	</div>
	<?php include('add.php');?>
	<?php include('templates/js_popper.php');?>



	<script>

function loadproducts(){
	var name = $("#search").val();
	if(name){
		$.ajax({
			type: 'post',
			data: {
				products:name,
			},
			url: 'loadproducts.php',
			success: function (Response){
				$('#products').html(Response);
			}
		});
	}
};

$(document).ready(function(){

  $('#customer_search').typeahead({

    source: function(query, result)
    {

        $.ajax({
          url: 'loadcustomer.php',
          method: "POST",
          data:{
            query:query
          },
          dataType: "json",
          success:function(data)
          {
            result($.map(data,function(item){
              return item;
            }));
          }
        })
    }
  });
});


function GrandTotal(){
  var TotalValue = <?php echo $totalv ?>;
  var TotalPriceArr = $('#tableData tr .totalPrice').get()
  var discount = $('#discount').val();

  $(TotalPriceArr).each(function(){
    TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("Rs.",""));
  });

  if(discount != null){
    var f_discount = 0;

    f_discount = TotalValue - discount;

    $("#totalValue").text(accounting.formatMoney(f_discount,{symbol:"Rs.",format: "%s %v"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
  }else{
    $("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"Rs.",format: "%s %v"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
  }
};

$(document).on('change', '#discount', function(){
  GrandTotal();
});

$('body').on('click','.js-add',function(){
			var totalPrice = 0;
   		var target = $(this);
    	var product = target.attr('data-product');
    	var price = target.attr('data-price');
    	var barcode = target.attr('data-barcode');
    	var unit = target.attr('data-unt');   	
    	swal({
        title: "Enter number of items:",
  			content: "input",
		  })
		  .then((value) => {
			  if (value == "") {
				  swal("Error","Entered none!","error");
			  }else{
				  var qtynum = value;
				  if (isNaN(qtynum)){
    				swal("Error","Please enter a valid number!","error");
          }else if(qtynum == null){
            swal("Error","Please enter a number!","error");
    		  }else{
    				var total = parseInt(value,10) * parseFloat(price);
    				$('#tableData').append("<tr class='prd'><td class='barcode text-center'>"+barcode+"</td><td class='text-center'>"+product+"</td><td class='price text-center'>"+accounting.formatMoney(price,{symbol:"Rs.",format: "%s %v"})+"</td><td class='qty text-center'>"+value+"</td><td class='totalPrice text-center'>"+accounting.formatMoney(total,{symbol:"Rs.",format: "%s %v"})+"</td><td class='text-center p-1'><button class='btn btn-danger btn-sm' type='button' id='delete-row'><i class='fas fa-times-circle'></i></button><tr>");
	          GrandTotal();
        }
			}
  });
});

$(document).ready(function(){
  	document.getElementById("search").focus();
 });

$("body").on('click','#delete-row', function(){
   	var target = $(this);
   	swal({
  		title: "Remove this item?",
  		icon: "warning",
  		buttons: true,
  		dangerMode: true,
		})
		.then((willDelete) => {
  		if (willDelete) {
  			$(this).parents("tr").remove();
    		swal("Removed Successfully!", {
      		icon: "success",
    		});
    			GrandTotal();
  		}
	});
});

$(document).on('click','.Enter',function(){

  var TotalPriceArr = $('#tableData tr .totalPrice').get();

  if($.trim($('#customer_search').val()).length == 0){
      swal("Warning","Please Enter Customer Name!","warning");
      return false;
    }
	

  if (TotalPriceArr == 0){
    swal("Warning","No products ordered!","warning");
    return false; 
  }else{

    var product = [];
    var quantity = [];
    var price = [];
    var user = $('#uname').val();
    var customer = $('#customer_search').val();
    var discount = $('#discount').val();

    $('.barcode').each(function(){
      product.push($(this).text());
    });
    $('.qty').each(function(){
      quantity.push($(this).text());
    });
    $('.price').each(function(){
      price.push($(this).text().replace(/,/g, "").replace("Rs.",""));
    });

    swal({
      title: "Enter Cash",
      content: "input",
    })
    .then((value) => {  
      if(value == "") {
        swal("Error","Entered None!","error");
      }else{

        var qtynum = value;
        if(isNaN(qtynum)){
          swal("Error","Please enter a valid number!","error");
        }else if(qtynum == null){
          swal("Error","Entered None!","error");
        }else{

          var change = 0;
          // var TotalPriceArr = $('#tableData tr .totalPrice').get()
          // $(TotalPriceArr).each(function(){
          //   TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("Rs.",""));
          // });
          var TotalValue = parseFloat($('#totalValue').text().replace(/,/g, "").replace("Rs.",""));

          if(TotalValue > qtynum){
            swal("Error","Can't process a smaller number","error");
          }else{
            change = parseInt(value,10) - parseFloat(TotalValue);
            $.ajax({
              url:"insert_sales.php",
              method:"POST",
              data:{totalvalue:TotalValue, product:product, price:price, user:user, customer:customer, quantity:quantity, discount:discount},
              success: function(data){
                
                if( data == "success"){
                  swal({
                    title: "Change is " + accounting.formatMoney(change,{symbol:"Rs.",format: "%s %v"}),
                    icon: "success",
                    buttons: "Okay",
                  })
                  .then((okay)=>{
                    if(okay){
                      window.location.href='main.php?action=pos&id=<?php echo $p_id ?>';
                    }
                  })
                }else{
                  window.location.href='main.php?action=pos&id=<?php echo $p_id ?>'+data;
                }
                
              }
            });
          }
        }
      }
    });
  }
});

$(document).on('click','.cancel',function(e){
  var TotalPriceArr = $('#tableData tr .totalPrice').get();
  if (TotalPriceArr == 0){
    return 0;
  }else{
    swal({
      title: "Cancel orders?",
      text: "By doing this,orders will remove!",
      icon: "warning",
      buttons: ["No","Yes"],
      dangerMode: true,
    })
    .then((reload) => {
      if (reload) {
        location.reload();
      }
    });
  }
});

function out(){
  var lag = "logout";
  swal({
      title: "Logout?",
      icon: "warning",
      buttons: ["Cancel","Yes"],
      dangerMode: true,
    })
    .then((value) => {
      if(value){
        if(lag){
            $.ajax({
              type: 'post',
              data: {
                logout:lag
              },
              url: 'server/connection.php',
              success: function (data){
                window.location.href='index.php';
              }
            });
        }
      }
    })
};

$(document).on('click','.Save',function(){


var TotalPriceArr = $('#tableData tr .totalPrice').get();
if(TotalPriceArr==0){
	TotalPriceArr=<?php echo $totalv ?>;
}

if (TotalPriceArr == 0){
  swal("Warning","No products ordered!","warning");
  return false; 
}else{

  var product = [];
  var quantity = [];
  var price = [];
  var user = $('#uname').val();
  var customer = $('#customer_search').val();
  var discount = $('#discount').val();

  $('.barcode').each(function(){
	product.push($(this).text());
  });
  $('.qty').each(function(){
	quantity.push($(this).text());
  });
  $('.price').each(function(){
	price.push($(this).text().replace(/,/g, "").replace("Rs.",""));
  });

  swal({
	title: "Save?",
      icon: "warning",
      buttons: ["Cancel","Yes"],
      dangerMode: true,
    })
    .then((value) => {
      if(value){
	  var qtynum = value;
	  if(isNaN(qtynum)){
		swal("Error","Please enter a valid number!","error");
	  }else if(qtynum == null){
		swal("Error","Entered None!","error");
	  }else{

		var change = 0;
		// var TotalPriceArr = $('#tableData tr .totalPrice').get()
		// $(TotalPriceArr).each(function(){
		//   TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("Rs.",""));
		// });
		var TotalValue = parseFloat($('#totalValue').text().replace(/,/g, "").replace("Rs.",""));
			var hello=false;
		if(hello==true){
		  swal("Error","Can't process a smaller number","error");
		}else{
		  
		  $.ajax({
			url:"addsql.php",
			method:"POST",
			data:{totalvalue:TotalValue, product:product, price:price, user:user, customer:customer, quantity:quantity, discount:discount},
			success: function(data){
			  
			  if( data == "success"){
				swal({
				  title: "Data Saved",
				  icon: "success",
				  buttons: "Okay",
				})
				.then((okay)=>{
				  if(okay){
					window.location.href='../pos.php';
				  }
				})
			  }else{
				window.location.href='main.php?action=pos&id=<?php echo $p_id ?>'+data;
			  }
			  
			}
		  });
		}
	  }
	}
  });
}
});

	</script>
	<script src="bootstrap4/js/time.js"></script>
</body>
</html> 
<?php
}
}

?>