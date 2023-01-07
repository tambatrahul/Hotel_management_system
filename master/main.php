<?php

if (isset($_GET["action"])) {
    if ($_GET["action"] == "pos") {
        $p_id= $_GET["id"];

        include('server/connection.php');
        if (isset($_SESSION['username'])) {
            header('location: main.php?action=pos&id=4');
        }
        $added = isset($_GET['added']);
        $error = isset($_GET['error']);
        $undelete = isset($_GET['undelete']);
        $updated = '';
        $deleted = '';
        $failure = isset($_GET['failure']);

        $query 	= "SELECT * FROM `customer`";
        $show	= mysqli_query($db, $query);
        if (isset($_SESSION['username'])) {
            $user = $_SESSION['username'];
            $sql = "SELECT position FROM users WHERE username='$user'";
            $result	= mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('templates/head.php'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body style="background:  #285430;">
<br>
<div id="footer" class="w-100" style=" position:relative;">
			<button id="buttons" onclick="window.location.href='user/user.php'" class="btn btn-dark border mr-2 ml-2"><i class="fas fa-users"></i> Dine In</button>
			<button id="buttons" onclick="window.location.href='products/products.php'" class="btn btn-dark border mr-2"><i class="fas fa-box-open"></i> Tablet</button>
			<button id="buttons" onclick="window.location.href='supplier/supplier.php'" class="btn btn-dark border mr-2"><i class="fas fa-user-tie"></i> My Orders</button>
			<button id="buttons" onclick="window.location.href='customer/customer.php'" class="btn btn-dark border mr-2"><i class="fas fa-user-friends"></i> Dashboard</button>
			<button id="buttons" onclick="window.location.href='logs/logs.php'" class="btn btn-dark border mr-2"><i class="fas fa-globe"></i> Logs</button>
			<button id="buttons" onclick="window.location.href='cashflow/cashflow.php'" class="btn btn-dark border mr-2"><i class="fas fa-money-bill-wave"></i> Cash-Flow</button>
			<button id="buttons" onclick="window.location.href='sales/sales.php'" class="btn btn-dark border mr-2"><i class="fas fa-shopping-cart"></i> Sales</button>
			<button id="buttons" onclick="window.location.href='delivery/delivery.php'" class="btn btn-dark border mr-2"><i class="fas fa-truck"></i> Deliveries</button>
			<button id="buttons" name="logout" type="button" onclick="out();" class="logout btn btn-danger border mr-2"><i class="fas fa-sign-out-alt"></i> Logout</button> 
		</div>
	<div class="h-100 bg-#285430" id="container">
		<div id="header">
			<?php include('alert.php');?>

			
			<div class="text-white mt-0 ml-5">
				<table class="table-responsive-sm">
					<tbody>
						<tr>
							<td valign="baseline"><small></small></td>
							<td valign="baseline"><small><?php  $row['position'];
                }
            }
        }?></p></small></td>
						</tr>
						<tr style="position:absolute; right:0 ;">
							<td valign="baseline"><small class="pb-1">Date:</small></td>
							<td valign="baseline"><small><p class="p-0 ml-5"><i class="fas fa-calendar-alt">&nbsp</i><span id='time'></span></p></small></td>
						</tr>
						<tr>
							<td valign="baseline"><small class="mt-5"></small></td>
							<td valign="baseline"><small><div class="content p-0 ml-5"><input type="hidden" value="<?php echo $p_id ?>"class="form-control form-control-sm customer_search" autocomplete="off" data-provide="typeahead" id="customer_search" placeholder="Customer Search" name="customer"/></small></div>
							</td>
							</tr>
					</tbody>
				</table>
			</div>
			<?php
                $select = "SELECT image FROM cart WHERE user='$p_id' ORDER BY id DESC LIMIT 1";
        $res = mysqli_query($db, $select);
        if (mysqli_num_rows($res) > 0) {
            $tv = mysqli_fetch_array($res);
            $totalv=$tv['image'];
        } else {
            $totalv=0;
        }
        ?>
			
		</div>
		<div id="content" class="mr-2"style="position: relative;left: 20px;top:-90px;">
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

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $names=$row['name'];
                $sql10 = mysqli_query($db, "SELECT product_name FROM products WHERE product_no = $names");
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
			<div id="table_buttons"style="position: relative;
  top:-90px;">
				<button id="buttons" type="button" style="width:40ch;" name='enter' class="Enter btn btn-dark border ml-2" accesskey="a"><i class="fas fa-handshake"></i><a href= "print.php?action=print&id=<?php echo($row["id"]);?>" accesskey="m"></a> Bill</button>
				
			
					
				
					<ul class="text-white justify-content-left">
					
						<li class="mb-0 mt-0"><input type="hidden" style="width: 100px" class="text-right form-control-sm"  name="discount" value="0" min="0" placeholder="Enter Discount" id="discount" ></li>
					</ul>
					<button id="buttons" type="button"style="width:40ch;position: relative;top:-60px;left:45ch;" name='kot' class="Kot btn btn-dark border ml-2" ><i class="fas fa-shopping-cart"></i> KOT</button>
	
				
			</div>
		</div>
		<div id="sidebar">
			<div class="mt-1 "style="position: relative;
  top:-90px;">
			<!-- <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span></div>
   				<input class="form-control" type="text" placeholder="Product Search" aria-label="Search" id="search" name="search" onkeyup="loadproducts();"/>
   			</div> -->
			<select id="box" class="box" id="products" onclick="loadproducts()">
			<optgroup style="height:100px">
				<?php
                include('server/connection.php');
        $query="SELECT * from products";
        $records = mysqli_query($db, $query);
        while ($data=mysqli_fetch_array($records)) {
            echo "<option class='form-control' value='".$data['id']."'>" .$data['product_name'].  "</option>";
        }

        ?>	
			</optgroup>
			</select>
	</div>
			   <!-- <div id="product_area" class="table-responsive-sm mt-2 table-wrapper-scroll-y my-custom-scrollbar" style="position: relative;
  top:-90px;">
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
			</div> -->
			<div class="header_price border p-2"style="position: relative;
  top:170px;height:10ch;background-color: #285430;">
				<p class="pb-0 mr-2 " style=" color: white;font-size: 40px;" id="totalValue">Rs. <?php echo $totalv?>.00</p>
				
			</div>
			<div class="w-100 mt-2" id="enter_area"style="position: relative;
  top:-190px;"><br>
				<button id="buttons" type="button" class="cancel btn btn-dark border"><i class="fas fa-ban"></i> Cancel</button>
			</div>
		</div>
		<div id="footer" class="w-100"style="position: relative;
  top:-180px;">
	<button id="buttons" type="button" name='save' class="Save btn btn-dark border ml-2"><i class="fas fa-handshake"></i> Save</button>
		<button id="buttons" type="button" name='cash' class="Cash btn btn-dark border ml-2"><i class="fas fa-box-open"></i> Cash</button>
		<button id="buttons" type="button" name='online' class="Online btn btn-dark border ml-2" ><i class="fas fa-globe"></i> Online</button>
				
		</div>
	</div>
	
	<?php include('add.php');?>
	<?php include('templates/js_popper.php');?>



	<script>

function loadproducts(){
	$(document).ready(function() {
		
	});
}

// $(document).ready(function(){

//   $('#customer_search').typeahead({

//     source: function(query, result)
//     {

//         $.ajax({
//           url: 'loadcustomer.php',
//           method: "POST",
//           data:{
//             query:query
//           },
//           dataType: "json",
//           success:function(data)
//           {
//             result($.map(data,function(item){
//               return item;
//             }));
//           }
//         })
//     }
//   });
// });


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
    TotalPriceArr=<?php echo $totalv ?>;
	if (TotalPriceArr == 0){
  swal("Warning","No products ordered!","warning");
  return false; 
}
	var id=<?php echo $p_id ?>;
	$.ajax({
              url:"addmybill.php",
              method:"POST",
              data:{total:TotalPriceArr,id:id},
              success: function(data){
                
				if( data == "success"){
                  swal({
                    title: "Bill Printed ",
                    icon: "success",
                    buttons: "Okay",
                  })
                  .then((okay)=>{
                    if(okay){
						window.open("print.php?action=kot&id=<?php echo $p_id ?>", '_blank');
					window.location.href='../pos.php';
                    }
                  })
                }else{
                  window.location.href='main.php?action=pos&id=<?php echo $p_id ?>'+data;
                }
                
              }
            });




	

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

          var change = 0;
          // var TotalPriceArr = $('#tableData tr .totalPrice').get()
          // $(TotalPriceArr).each(function(){
          //   TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("Rs.",""));
          // });
          var TotalValue = parseFloat($('#totalValue').text().replace(/,/g, "").replace("Rs.",""));

            $.ajax({
              url:"insert_sales.php",
              method:"POST",
              data:{totalvalue:TotalValue, product:product, price:price, user:user, customer:customer, quantity:quantity, discount:discount},
              success: function(data){
                
                if( data == "success"){
                  swal({
                    title: "Bill Printed",
                    icon: "success",
                    buttons: "Okay",
                  })
                  .then((okay)=>{
                    if(okay){
						window.open("print.php?action=kot&id=<?php echo $p_id ?>", '_blank');
					window.location.href='../pos.php';
                    }
                  })
                }else{
                  window.location.href='main.php?action=pos&id=<?php echo $p_id ?>'+data;
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







	$(document).on('click','.Kot',function(){


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
	title: "Print Kot?",
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
			url:"addkot.php",
			method:"POST",
			data:{totalvalue:TotalValue, product:product, price:price, user:user, customer:customer, quantity:quantity, discount:discount},
			success: function(data){
			  
			  if( data == "success"){
				swal({
				  title: "Kot Printed",
				  icon: "success",
				  buttons: "Okay",
				})
				.then((okay)=>{
				  if(okay){
					<?php
            $select = "SELECT `id` FROM `kot` ORDER BY `id` DESC LIMIT 1";
        $res = mysqli_query($db, $select);
        $id = mysqli_fetch_array($res);
        $hid=$id['id']+1;
        ?>
					window.open("print.php?action=kot&id=<?php echo $hid ?>", '_blank');
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






$(document).on('click','.Cash',function(){

var TotalPriceArr = $('#tableData tr .totalPrice').get();

if($.trim($('#customer_search').val()).length == 0){
	swal("Warning","Please Enter Customer Name!","warning");
	return false;
  }

  if (TotalPriceArr == 0){
  TotalPriceArr=<?php echo $totalv ?>;
  if (TotalPriceArr == 0){
  swal("Warning","No products ordered!","warning");
  return false; 
}
  var id=<?php echo $p_id ?>;
  $.ajax({
			url:"cash.php",
			method:"POST",
			data:{total:TotalPriceArr,id:id},
			success: function(data){
			  
			  if( data == "success"){
				swal({
				  title: "Order Done! ",
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
});


$(document).on('click','.Online',function(){

var TotalPriceArr = $('#tableData tr .totalPrice').get();

if($.trim($('#customer_search').val()).length == 0){
	swal("Warning","Please Enter Customer Name!","warning");
	return false;
  }

  if (TotalPriceArr == 0){
  TotalPriceArr=<?php echo $totalv ?>;
  if (TotalPriceArr == 0){
  swal("Warning","No products ordered!","warning");
  return false; 
}
  var id=<?php echo $p_id ?>;
  $.ajax({
			url:"online.php",
			method:"POST",
			data:{total:TotalPriceArr,id:id},
			success: function(data){
			  
			  if( data == "success"){
				swal({
				  title: "Order Done! ",
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
});







	</script>
	<script src="bootstrap4/js/time.js"></script>
</body>
</html> 
<?php
    }
}

?>