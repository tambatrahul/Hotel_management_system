<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

  <script src="bootstrap4/jquery/sweetalert.min.js"></script>
  <script src="bootstrap4/jquery/accounting.min.js"></script>
	<link rel="stylesheet" href="../assets//css//style.css">
	<link rel="stylesheet" href="./CSS/style.css" />
	<title>GYR</title>
</head>
<body style="background-color: #F5F5F5;">
	<!-- <div class="py-2	" style="height:50px; background-color:#C9E6FF;">
		<center><h3 style="">Order Products for Table No.<?php
            $uri_query = parse_url($_SERVER["REQUEST_URI"]);
parse_str($uri_query['query'], $params);
echo ''.$params['id'];
?></h3></center>
	</div>
	<div>

	</div> -->
	<div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4 pt-5">
          <h1><a href="index.html" class="logo">DIgi Rasoi</a></h1>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a
                href="#homeSubmenu"
                data-toggle="collapse"
                aria-expanded="false"
                class="dropdown-toggle"
                >Dine IN</a
              >
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                  <a href="#">Home 1</a>
                </li>
                <li>
                  <a href="#">Home 2</a>
                </li>
                <li>
                  <a href="#">Home 3</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Tablets</a>
            </li>
            <li>
              <a
                href="#pageSubmenu"
                data-toggle="collapse"
                aria-expanded="false"
                class="dropdown-toggle"
                >My-Orders</a
              >
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                  <a href="#">Page 1</a>
                </li>
                <li>
                  <a href="#">Page 2</a>
                </li>
                <li>
                  <a href="#">Page 3</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Dashboards</a>
            </li>
            <li>
              <a href="#">Logs</a>
            </li>
			<li>
              <a href="#">CashFlow</a>
            </li>
			<li>
              <a href="#">Sales</a>
            </li>
			<li>
              <a href="#">Deliveries</a>
            </li>
          </ul>

          

        <div style="position:absolute; bottom:10px; width:100% ">
			<button type="button" class="btn btn-danger"><span class="bi bi-box-arrow-left mr-3"></span>Logout</button>
        </div>
      	</nav>

		<div>
		<td valign="baseline"><div class="content p-0 ml-5"><input type="hidden" value="<?php echo $_GET["id"]; ?>"class="form-control form-control-sm customer_search" autocomplete="off" data-provide="typeahead" id="customer_search" placeholder="Customer Search" name="customer"/></div></td>
		</div>
		<div>
		<div class="mb-0 mt-0"><input type="hidden" style="width: 100px" class="text-right form-control-sm"  name="discount" value="0" min="0" placeholder="Enter Discount" id="discount" ></div>
		</div>

      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
		<div class="py-2" style="height:50px; background-color:#C9E6FF;">
		<center><h3 style="">We are on Table number :-  <?php
    $p_id= $_GET["id"];
$uri_query = parse_url($_SERVER["REQUEST_URI"]);
parse_str($uri_query['query'], $params);
echo ''.$params['id'];
?></h3></center>
		</div>
		<!-- Top div start for sidebar and assigned waiter  -->
		<div style="display:flex; margin-top: 10px; background-color:aqua">
			<div style="justify-content: center;align-items:center;width:50%">
			<!-- <select class="form-select form-select mb-3" aria-label=".form-select-lg example">
  				<option selected>Select Products</option>
  				<?php
    include('server/connection.php');
$query="SELECT * from products";
$records = mysqli_query($db, $query);
while ($data=mysqli_fetch_array($records)) {
    echo "<option class='form-control' value='".$data['id']."'>" .$data['product_name'].  "</option>";
}
?>
			</select> -->
			<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span></div>

   				<input class="form-control border" type="text" placeholder="Product Search" aria-label="Search" id="search" name="search" onkeyup="loadproducts();"/>
   			</div>
			</div>

			<div style="width:50%; display: flex; justify-content: center;align-items:center;">
				<button>Assigned Waiter</button>
			</div>
			
		</div>

		<div class="main-div w-100 h-200px mt-5" style="display:flex;background-color: #C9E6FF;">
		  <div id="product_area" class="w-50 table table-primary table-responsive-sm mt-2 table-wrapper-scroll-y my-custom-scrollbar;">
				<table class="w-100 table-striped font-weight-bold" style="cursor: pointer;" id="table1">
					<thead>
						<tr claclass='text-center'><b>
							<td>Barcode</td>
							<td>Product Name</td>
							<td>Price</td>
							
						</tr></b>
						<tbody id="products" style="overflow-y: scroll;">
						</tbody>
					</thead>
				</table>
			</div>
      <div class="w-50">
        <div id="price_column" style="height: 300px;" class="">
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
              <tbody id="tableData">
					    </tbody>
				</table>
        <div id="table_buttons">
				  <!-- <button id="buttons" type="button" name='enter' class="Enter btn btn-dark border ml-2"><i class="fas fa-handshake"></i> Bill</button>
					  <ul class="text-white justify-content-left">
						  <li class="mb-0 mt-0"><input  style="width: 100px" class="text-right form-control-sm"  name="discount" value="0" min="0" placeholder="Enter Discount" id="discount" ></li>
					  </ul>
					<button id="buttons" type="button" name='kot' class="Kot btn btn-dark border ml-2" ><i class="fas fa-shopping-cart"></i> KOT</button>	 -->
			  </div>
        </div>

      <?php
                $select = "SELECT image FROM cart WHERE user='$p_id' ORDER BY id DESC LIMIT 1";
$res = mysqli_query($db, $select);
if (mysqli_num_rows($res) > 0) {
    $tv = mysqli_fetch_array($res);
    $totalv=$tv['image'];
    $totalv=0;
} else {
    $totalv=0;
}
?>
    <div>

    </div>


		</div>
      
      </div>
      <div class="header_price card mt-3 p-3 text-center float-right">
				<p class="h6 fs-3 fw-3" id="totalValue">Total Amount <?php echo $totalv?>.00 (₹)</p>
			</div>

      <div id="table_buttons" class="mt-3 d-flex col-md-6">
				  <!-- <button id="buttons" type="button" name='enter' class="Enter btn btn-dark border"><i class="fas fa-handshake"></i> Bill</button> -->
					<!-- <ul class="text-white justify-content-left">
						<li class="mb-0 mt-0"><input type="hidden" style="width: 100px" class="text-right form-control-sm"  name="discount" value="0" min="0" placeholder="Enter Discount" id="discount" ></li>
					</ul> -->
					<!-- <button id="buttons" type="button" name='kot' class="Kot btn btn-dark border" ><i class="fas fa-shopping-cart"></i> KOT</button> -->
          <div class="col-md-3">
          <button id="buttons" type="button" name='enter' class="Enter btn mb-2 mb-md-0 px-5 btn-outline-primary">
          <a href= "print.php?action=print&id=<?php echo($row["id"]);?>" accesskey="m"></a>
									<div class="icon d-flex align-items-center justify-content-center">
                    <span class="pr-1">BiLL</span>
                    <i class="bi bi-cash-stack"></i>
                  
									</div>
					</button>


          </div>
          <div class="col-md-3">
          <button id="buttons" type="button" name='kot' class="Kot btn mb-2 mb-md-0 px-5 btn-outline-primary">
									<div class="icon d-flex align-items-center justify-content-center">
                    <span class="pr-1">KOT</span> 
										<i class="bi bi-cash-stack pl-1"></i>
									</div>
					</button>
          </div>
          
			</div>

      <div class="mt-3 d-flex col-md-6">
      <div class="col-md-3">
          <button id="buttons" type="button" name='enter' class="Enter btn mb-2 mb-md-0 px-5 btn-outline-success">
									<div class="icon d-flex align-items-center justify-content-center">
                    <span class="pr-1">Save</span> 
										<i class="bi bi-cash-stack"></i>
									</div>
					</button>
          </div>
          <div class="col-md-3">
          <button id="buttons" type="button" name='kot' class="Kot d-flex btn mb-2 mb-md-0 px-5 btn-outline-success">
          <span class="pr-1">Cash</span> 
          <div class="icon d-flex d-flex-reverse align-items-end">
							<i class="bi bi-cash-stack"></i>
					</div>
					</button>
          </div>
          <div class="col-md-3">
          <button id="buttons" type="button" name='kot' class="Kot btn mb-2 mb-md-0 px-5 btn-outline-success">
									<div class="icon d-flex align-items-center justify-content-center">
                    <span class="pr-1">Online</span> 
										<i class="bi bi-cash-stack"></i>
									</div>
					</button>
          </div>
		  <div class="col-md-3">
          <button id="buttons" type="button" name='cancel' class="cancel btn mb-2 mb-md-0 px-5 btn-outline-success">
									<div class="icon d-flex align-items-center justify-content-center">
                    <span class="pr-1">Online</span> 
										<i class="bi bi-cash-stack"></i>
									</div>
					</button>
          </div>
      </div>
      
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js//main.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script>
    // For fetch Products
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


$(document).on('change', '#discount', function(){
  GrandTotal();
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

    $("#totalValue").text(accounting.formatMoney(f_discount,{symbol:"Total Amount ",format: "%s %v"+ "(₹)"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
  }else{
    $("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"Total Amount ",format: "%s %v" + "(₹)"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
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

// For Select Products
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

// For delete Products
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

$("body").on('click','.cancel', function(){
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
	var id=<?php echo $_GET["id"]; ?>

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
						window.open("print.php?action=kot&id=<?php echo $_GET["id"]; ?>", '_blank');
					window.location.href='../pos.php';
                    }
                  })
                }else{
                  window.location.href='main.php?action=pos&id=<?php echo $_GET["id"]; ?>'+data;
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
	var TotalValue = $('#totalValue').text().replace(/,/g, "").replace("Total Amount","").replace("(₹)","");

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
          window.location.href='../print.php?action=print&id=<?php echo $p_id ?>';
                    }
                  })
                }else{
                  window.location.href='main.php?action=pos&id=<?php echo $p_id ?>'+data;
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
		var TotalValue = $('#totalValue').text().replace(/,/g, "").replace("Total Amount","").replace("(₹)","");
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
					window.location.href='../print_kot.php?action=kot&id=<?php echo $p_id ?>';
					
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

  </body>
</body>
</html>