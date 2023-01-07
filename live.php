<?php
include('database.inc.php');
$sql0="select * from confirmed where action!='Served'";
$res1=mysqli_query($con,$sql0);

$sql1="SELECT  * FROM confirmed WHERE action!='Served'";
$select_rows1 = mysqli_query($con,$sql1);
$row_count1 = mysqli_num_rows($select_rows1);

?>





<div class="card">
            <div class="card-body">
              <p class="grid_title"><h1>Order Records</h1></p>
              <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                        <th width="20%">Table No</th>
                            <th width="20%">Dish</th>
                            <th width="12%">Quantity</th>
                            <th width="25%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res1)>0){
						$i=1;
						while($row1=mysqli_fetch_assoc($res1)){
						?>
						<tr>
                            <td><?php echo $row1['user']?></td>
                            <td><?php echo $row1['fname']?></td>
                            <td><?php echo $row1['quantity']?></td>
					
							<td>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="liveorders.php?action=cancel&user=<?php echo ( $row1["user"]);?>&id=<?php echo ( $row1["orderno"]);  ?>"><button type="button" onclick="return confirm('item already in cart do you want to update?');" class="btn btn-warning">Cancel</button></a>

  
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
                  </div>
				</div>
              </div>
            </div>
          </div>


		  <?php