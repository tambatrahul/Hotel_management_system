<?php 
include('top.php');

$sql="select * from feedback order by id";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Customer Feedback</h1>
			 
              <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="50%">Name</th>
                            <th width="15%">Number</th>
                            <th width="25%">Feedback</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['name']?></td>
							<td><?php echo $row['number']?></td>
							<td><?php echo $row['feed']?></td>
                            </td>
                           
                           </tr>
                           <?php 
                           $i++;
                           } } else { ?>
                           <tr>
                               <td colspan="5">No data found</td>
                           </tr>
                           <?php } ?>
                         </tbody>
                       </table>