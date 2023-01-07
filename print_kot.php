
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
td.gst,
th.gst {
    width: 40px;
    max-width: 40px;
	word-break: break-all;
}
td.price,
th.price {
    width: 60px;
    max-width: 60px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 175px;
    max-width: 175px;
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
session_start();
    include('database.inc.php');
    include('function.inc.php');
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "print") {
            $p_id= $_GET["id"];
            $result22= mysqli_query($con, "SELECT added_on FROM fetch_orderid WHERE id='$p_id'");
            $row2 = mysqli_fetch_assoc($result22);
            $dt = new DateTime($row2['added_on']);

            ?>
		   <div class="ticket">
            <p class="centered">Lake View
                Veg Restaurent.
				
                <br>Gate No.5,Mira Bhayander,near Kali mandir, Shivar Garden,Mira road.</p>
                Date:<?php echo $dt->format('d M Y H:i')?><br>
				Bill No.<?php echo $p_id?> 
            <table class="background-color:#FF8A8A">
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
            $result2= mysqli_query($con, "SELECT * FROM print_kot WHERE id='$p_id'");
            while ($row = mysqli_fetch_assoc($result2)) {
                $total = ($row["quantity"] * $row["price"]);
                $gtotal = $gtotal + $total;
                ?>
				<tr>
				<td class="description"><?php echo $row['items'] ?></td>	
				<td class="quantity"><?php echo $row['quantity'] ?></td>
				<td class="price"><?php echo $row['price'] ?></td>
				<td class="price"><?php echo $total ?></td>
				<?php
                $i++;
                ?>
			</tr>
			<?php
            }
            $taxrate=5;
            $gtotaltax=round($gtotal*($taxrate/100));
            $grandtotal=$gtotaltax+$gtotal;
            $cgst=round($gtotal*(2.5/100));
            ?>
                  <tr>
				  <td class="price">Total-</td>
				  <td class="price"><?php  ?></td>
				  <td class="price"><?php  ?></td>
				  <td class="price"><b><?php echo $gtotal ?>/-</b></td>
				  </tr>
				  <tr>
				  <td class="price">CGST-</td>
				  <td class="gst">2.5%</td>
				  <td class="price"></td>
				  <td class="price"><?php echo $cgst ?>/-</td>
				  
				  </tr>
				  <tr>
				  <td class="price">SGST-</td>
				  <td class="gst">2.5%</td>
				  <td class="price"></td>
				  <td class="price"><?php echo $cgst   ?>/-</td>
				
				  </tr>
				  
                </tbody>
            </table>
			Grand total =&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $grandtotal ?>/-</b>
            <p class="centered">Thanks for your visit!
                <br>Hope you enjoyed your meal

        </div>
        <script src="script.js"></script>



		 <script>
			window.print();
		</script>
		<?php
        }
    }
    ?>
		  