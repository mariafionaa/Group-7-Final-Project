<h2>Registration Payment Confirmation</h2>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Succeed!</strong> Registration Payment Confirmation.
    </div>";
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Registration Confirmation</h4>
                <p class="category">Confirm Registration</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Payment Confirmation Data</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Registrant Name</b></td>
							<td><b>Email</b></td>
							<td><b>Installment no</b></td>
							<td><b>Payment status</b></td>
							<td><b>Action</b></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "SELECT a.id,a.installment_no, a.installment_status, c.email, d.name,b.id idd FROM registration_installment a , registration_detail b, account c, registration d WHERE a.regist_detail_id = b.id AND a.installment_status = 0 AND c.user_id = d.id AND b.user_id = d.id ";

				    		$exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				    $status = $rows['installment_status'];		
				    	?>		
								
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['name']; ?></td>
										<td><?php echo $rows['email']; ?></td>
										<td><b><?php echo $rows['installment_no']; ?></b></td>
										<td><?php 
										$status == 0 ? 
										print("<font color='#e74c3c'>Not confirmed</font>") : 
										print("<font color='##2ecc71'>Confirmed</font>"); 
										?></td>
										<td>
											<!-- <a href="" class="btn btn-primary btn-sm">Confirmation</a> -->
											<a href="include/registration_installment_confirmation_process.php?id=<?php echo $rows['id'] ?>&&idd=<?php echo $rows['idd'] ?>" class="btn btn-warning btn-sm">Confirmation</a>
										</td>
									</tr>

				    	<?php
				    				}
				    			}else{
				    				echo "<td colspan='5' align='center'><h3><b>No one has confirmed Payment yet</b></h3></td>";
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}
				    	?>
				        
				    </tbody>
				</table>
            </div>
        </div>
    </div>
</div>

<?php  
unset($_SESSION['message']);
?>