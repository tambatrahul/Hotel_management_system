
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
session_start();
include('database.inc.php');
include('function.inc.php');
		  if(isset($_GET["action"]))
		  {
			
		 if($_GET["action"] == "print")
		 {
			$p_id= $_GET["id"];
		   ?>
		   <div class="ticket">
            <p class="centered">BANARASI TADKA
                <br>Pure Veg Family Dhaba
				
                <br>Sasupada,Sasunavghar, Naigoan-401208</p>
                Bill No.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Table No:1
            <table>
                <thead>
                    <tr>
					<th class="description">Products</th>
                    <th class="quantity">No.</th>
					<th class="price">Rs</th>
                    <th class="description">Total</th>
                    </tr>
                </thead>
                <tbody>
				
 			
				
				<tr>
				<td class="description">veg curry  <br>
            <br></td>	
				<td class="quantity"> 2 <br>
            <br></td>
			    <td class="price"> 200 <br>
            <br></td>
                <td class="price">200  <br>
            <br></td>	
              
           
            
			</tr>
            
            <tr>
				<td class="description">veg crispy  <br>
            <br></td>	
				<td class="quantity"> 1 <br>
            <br></td>
			    <td class="price"> 300 <br>
            <br></td>
                <td class="price"> 300 <br>
            <br></td>
			
				
                </tr>
            <br>
            <br>
            <tr>
				<td class="description">naan  <br>
            <br></td>	
				<td class="quantity"> 6 <br>
            <br></td>
			    <td class="price">100 <br>
            <br></td>
                <td class="price">100 <br>
            <br> </td>
			
				
                </tr>
            <br>
            <br>
            <tr>
				  <td class="price">Total-</td>
				  <td class="price">  </td>
				  <td class="price">  </td>
				  <td class="price"> 1000 /-</td>
				  </tr>
				  <tr>
				  <td class="price">CGST-</td>
				  <td class="price">  </td>
				  
				  <td class="price">  </td>
				  <td class="price">2.5%</td>
				  </tr>
				  <tr>
				  <td class="price">SGST</td>
				  <td class="price">  </td>
				  
				  <td class="price">  </td>
				  <td class="price">2.5%</td>
				  </tr>
				  
                </tbody>
            </table>  
			Grand total = 1080 /-
            <p class="centered">Thanks for your visit!
                <br>Hope you enjoyed your meal
			<br>Contact-8898825681</p>
        </div>
        <script src="script.js"></script>



		 <script>
			window.print();
		 
		</script>
	
		 