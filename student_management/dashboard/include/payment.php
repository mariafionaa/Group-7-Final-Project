<h2>Payment</h2>

<?php  

$queryx     =   "SELECT * FROM registration_detail WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $regist = mysqli_fetch_array($execx);

}else{
    echo 'failed';
}	

?>


<div class="row"> 	
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Payment</h4>
                <p class="category">Fill in the registration form correctly</p>
            </div>
            <div class="card-content">
            
            <h4><b>Print receipt of registration fee to be paid. Conditions after payment are as follows:</b></h4>
           
            <h4><b>The fees to be paid are as follows: </b></h4>
			<ol>
				<li><b></b></li>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Type of Expense</th>
							<th align="right">Cost</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Development Money</td>
							<td align="right">Rp 10.000.000</td>
						</tr>
						<tr>
							<td>Matriculation Program Fees and Study Orientation Period</td>
							<td align="right">Rp 5.000.000</td>
						</tr>
						<tr>
							<td>Semester payment</td>
							<td align="right">Rp 32.000.000</td>
						</tr>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.47.000.000</b></td>
						</tr>
					</tbody>
				</table>
				
					
			<?php  
			if ($regist['regist_status'] == 1) {
    
			    // echo '<a href="../assets/uploads/print_payment_receipt.jpeg" class="btn btn-primary btn-md pull-left" download><i class="fa fa-print"></i> Print the fee to be paid for registration</a>';
				if ($regist['regist_payment_method'] != "") {
					echo '<a href="index.php?page=13&payment_method='.$regist['regist_payment_method'].'&status=true" class="btn btn-primary btn-md pull-left"><i class="fa fa-print"></i> Print the fee to be paid for registration</a>';
				}else{
					echo '<a href="#" class="btn btn-primary btn-md pull-left" download data-toggle="modal" target-data="#myModal"><i class="fa fa-print"></i> Print the fee to be paid for registration</a>';	
				}

			    

			    echo '<br><br>';
			}else if ($regist['regist_status'] == 2) {
                            echo "<div class='alert alert-warning alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>You have already made the payment</strong> 
                            </div>";
            }else if($regist['regist_status'] == 0){
                echo "<div class='alert alert-warning alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Requirements are complete. wait for admin confirmation no later than 2 working days</strong> 
                </div>";
            }else if ($regist['regist_status'] == 4){
			    echo "<div class='alert alert-warning alert-dismissable'>
			      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			      <strong>Registration payment has been paid</strong>
			    </div>";
			}else if($regist['regist_status'] == 3){
				echo "<div class='alert alert-warning alert-dismissable'>
			      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			      <strong>Full Registration Payment in -1 Installment</strong>
			    </div>";
			}else {
				echo "<div class='alert alert-warning alert-dismissable'>
			      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			      <strong>Your registration has not been confirmed by the Admin.</strong> Wait for admin confirmation for the next step.
			    </div>";
			}

			?>
                

            </div>
        </div>
    </div>
</div>



<!-- MODAL -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose Payment Method</h4>
        </div>
        <div class="modal-body">
        <form action="index.php?page=13" method="get">
        	<input type="hidden" name="page" value="13">
          <div class="form-group">
              <label for="">Payment Method</label>
              <select name="metode_pembayaran" class="form-group">
                  <option value="0">Paid off</option>
                  <option value="1">Installment (6x)</option>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Choose</button>
          </form>
        </div>
      </div>
      
    </div>
</div>