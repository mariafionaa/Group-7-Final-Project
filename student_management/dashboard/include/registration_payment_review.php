


<center><h2>Registration Payment Details</h2></center>
<center><h3><b>President University</b></h3></center>
<center>______________________________________________________________________________________________</center>

<?php  

if (isset($_GET['payment_method'])) {
	$payment_method	=	$_GET['payment_method'];
}

$m 	= "";

if ($payment_method == 0) {
	$m = "L";
}else{
	$m = "C";
}

$queryUpdate 	=	"UPDATE registration_detail 
					SET regist_payment_method='$m'
					WHERE user_id=$id";

$execUpdate 	=	mysqli_query($conn, $queryUpdate);

if ($execUpdate) {
	echo '<script>alert("Successfully select the registration method, please make payment")</script>';
}else{
	echo mysqli_error($conn);
}


$queryx     =   "SELECT * FROM registration_detail WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $regist = mysqli_fetch_array($execx);

}else{
    echo 'fail';
}	

?>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Fees to be paid</h4>
                <p class="category"></p>
            </div>
            <div class="card-content">
            


            <h4><b><?php echo $name; ?></b>, You enter the class <?php echo "<b>".$regist['class']."</b>"; ?> by payment method 
            	<?php $payment_method == 0 ? print("<b><i>PAID OFF</i></b>") : print("<b><i>INSTALLMENT</i></b>"); ?>:</h4>
			
			<?php

				if ($payment_method == 0) {
			?>

				<ol>
				<li><b>All Class : </b></li>
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
				}else{
				?>

				<ol>
				<li><b>INSTALLMENT</b></li>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
						<th>Type of Expense</th>
							<th align="right">Cost</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.47.000.000</b></td>
						</tr>
						<tr>
							<td align="center"><b>Total installment every 6 months</b></td>
							<td align="right"><b>Rp 8.000.000</b></td>
						</tr>
					</tbody>
				</table>
				<?php
				}
				?>

				
			
			<?php
			}else{
			?>

			
			</ol>
			
			<p>Make payment to account XXX a.n XXX</p>

			<b>Confirm on the registration confirmation page</b>
			<br>
			<?php  

			// if ($regist['regist_status'] == 1) {
    
			//     // echo '<a href="../assets/uploads/payment-receipt.jpeg" class="btn btn-primary btn-md pull-left" download><i class="fa fa-print"></i> Print the fee to be paid for registration</a>';

			//     echo '<a href="#" class="btn btn-primary btn-md pull-left" download data-toggle="modal" data-target="#myModal"><i class="fa fa-print"></i> Print the fee to be paid for registration</a>';

			//     echo '<br><br>';
			// }else{
			//     echo "<div class='alert alert-warning alert-dismissable'>
			//       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			//       <strong>Your registration has not been confirmed by the Admin.</strong> Wait for admin confirmation for the next step.
			//     </div>";
			// }

			?>
            
            <h5 align="right">Print Date :	<b><?php echo date("Y-m-d"); ?></b></h5>
			
			<button class="btn btn-primary btn-md pull-right" id="print"><i class="fa fa-print"></i>&nbsp; Print</button>	

            </div>
        </div>
    </div>
</div>



