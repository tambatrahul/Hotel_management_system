
<style>
	* {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    body *{
        visibility:hidden;
    }
    .ticket, .ticket *{
        visibility: visible;
    }
.ticket{
    position:absolute;
    left:40px;
    top:-10px;
    bottom:20px;
}
   
}
@page{
    size:auto;
    margin:20;
}
	</style>
	


    <?php
include('server/connection.php');

$id=mysqli_query($db, "SELECT * FROM sales ORDER BY reciept_no DESC LIMIT 0,1");
$ans_id=mysqli_fetch_assoc($id);
		$print=mysqli_query($db, "SELECT `print` FROM `sales` WHERE reciept_no='".$ans_id['reciept_no']."'");
        $print_row=mysqli_fetch_assoc($print);
        
        if($print_row['print']==0){
			
			$p_id= $ans_id['reciept_no'];
            $result21= mysqli_query($db, "SELECT * FROM sales_product WHERE reciept_no='$p_id'");
            $row21 = mysqli_fetch_assoc($result21);
		   ?>
		   <div class="ticket">
            <p class="centered">Lake View
                <br>Veg Restaurent.</p>
                Kot Bill No.<?php echo $p_id?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Table No:<?php echo $p_id?>
            <table>
                <thead>
                    <tr>
					<th class="description">Products</th>
                    <th class="quantity">Qty.</th>
					<th class="price">Rs</th>
                    <th class="description">Total</th>
                    </tr>
                </thead>
                <tbody>
				
 			
				<?php
 			$i=1;
			 $gtotal = 0;
			 $total = 0;
           $result2= mysqli_query($db, "SELECT * FROM sales_product WHERE reciept_no='$p_id'");
           
           $print1221=mysqli_query($db, "SELECT `total` FROM `sales` WHERE reciept_no='".$ans_id['reciept_no']."'");
        $print_row121=mysqli_fetch_assoc($print);

			while($row = mysqli_fetch_assoc($result2)){
				?>
				<tr>
				<td class="description"><?php echo $row['product_id'] ?></td>	
				<td class="quantity"><?php echo $row['qty'] ?></td>
				<td class="price"><?php echo $row['price'] ?></td>
				<td class="price"><?php echo $print_row121['total'] ?></td>
				<?php
				$i++;
				?>
			</tr>
			<?php
			}
		 ?>
				 
				  
                </tbody>
            </table>
		
         
                

        </div>
        <script src="script.js"></script>



		 <script>
			window.print();
		 
		</script>
		<?php
        $sql2 = "UPDATE sales SET print = 0 WHERE reciept_no='$p_id'";
        $result2 = mysqli_query($db, $sql2);
		 } 

		 ?>