<?php
session_start();
include('database.inc.php');
include('function.inc.php');
$sql="select* from fetch_orderid ORDER BY id DESC;";
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Order Master</h1>
			  <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="5%">Order Id</th>
                            <th width="10%">Table No</th>
							<th width="15%">Mode Of Payment</th>
                            <th width="10%">Total</th>
                            <th width="10%">Added On</th>
                           
                            <th width="10%">Bill</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td>
									<p><?php echo $i?></p>
							</td>
                            <td>
								<p><?php echo $row['user']?></p>
								
							<td>
								<p><?php echo $row['items']?></p>
								
							</td>
							<td><?php echo $row['total']?></td>
							<td>
							<?php 
							$dateStr=strtotime($row['added_on']);
							echo date('d-m-Y h:i:sa',$dateStr);
							?>
							</td>
            <td> <a href="print.php?action=print&id=<?php echo ( $row["id"]);?>"><button type="button" class="btn btn-warning">Bill</button></a></td>
              
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