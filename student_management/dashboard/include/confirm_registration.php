<h2>Registration Confirmation/h2>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Succeed!</strong> Registration Confirmation.
    </div>";
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Registration Confirmation</h4>
                <p class="category">Confirm registration</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Student Data</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Registrant Name</b></td>
							<td><b>Email</b></td>
							<td><b>Registration Status</b></td>
							<td><b>Action</b></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "SELECT a.name, a.id as registration_id, b.id as account_id,b.email,c.* 
				    				FROM registration a, account b, registration_detail c 
						    		WHERE a.id=b.user_id 
						    		AND b.user_role=1 
						    		AND c.user_id = a.id
                    				AND a.upload_birth_certificate != '' 
                    				AND a.upload_family_card != '' 
                    				AND a.student_photo != ''";

				    		$exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				    $status = $rows['regist_status'];				    			
				    	?>		
								
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['name']; ?></td>
										<td><?php echo $rows['email']; ?></td>
										<td><?php 
										$status == 0 ? 
										print("<font color='#e74c3c'>Not confirmed</font>") : 
										print("<font color='##2ecc71'>Confirmed</font>"); 
										?></td>
										<td>
											<!-- <a href="" class="btn btn-primary btn-sm">Konfirmasi</a> -->
											<a href="include/registration_confirmation_process.php?ida=<?php echo $rows['account_id'] ?>&idd=<?php echo $rows['registration_id'] ?>&idu=<?php echo $id ?>" class="btn btn-warning btn-sm">Confirmation</a>
										</td>
									</tr>

				    	<?php
				    				}
				    			}else{
				    				echo "<td colspan='5' align='center'><h3><b>No students registered yet</b></h3></td>";
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