<h1>Lecturer</h1>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Succeed!</strong> ".$_SESSION['message']."
    </div>";
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" style="background-color: salmon">
                <h4 class="title">Lecturer</h4>
                <p class="category">Lecturer List</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=11" class="btn btn-primary btn-md pull-right" style="background-color: seagreen"><i class="fa fa-plus"></i>Add Lecturer</a>
                <h3 style="overflow: hidden;"><b>Lecturer Data</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>NIP</b></td>
							<td><b>Lecturer Name</b></td>
							<td><b>Phone</b></td>
							<td><b>Address</b></td>
							<td><b>Update/Delete</b></td>
						</tr>
					</thead>
				    <tbody>
				    	
				    	<?php  

				    		$query = "SELECT * FROM lecturer";

				    		$exec  = mysqli_query($conn,$query);

				    		if ($exec) {
				    			$count = mysqli_num_rows($exec);
				    			if ($count > 0) {
				    				$no = 0;
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    	?>
						    			<tr>
											<td><?php echo ++$no; ?></td>
											<td><?php echo $rows['nip'] ?></td>
											<td><?php echo $rows['lecturer_name'] ?></td>
											<td><?php echo $rows['phone'] ?></td>
											<td><?php echo $rows['address'] ?></td>
											<td>
												<a href="index.php?page=12&id=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
												<a href="include/delete_lecturer.php?id=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
				    	<?php
				    				}
				    			}else{
				    	?>
				    			<tr>
									<td colspan="6" align="center"><h4><b>Empty</b></h4></td>
								</tr>
				    	<?php
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