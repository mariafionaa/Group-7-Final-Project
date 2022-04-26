<h1>Mata Pelajaran</h1>

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
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Subject</h4>
                <p class="category">List of Subject</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=20" class="btn btn-primary btn-md pull-right"><i class="fa fa-plus"></i> Add Subject</a>
                <h3 style="overflow: hidden;"><b>Subject Data</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Subject Code</b></td>
							<td><b>Subject Name</b></td>
							<td><b>Action</b></td>
						</tr>
					</thead>
				    <tbody>
				    	
				    	<?php  

				    		$query = "SELECT * FROM subject";

				    		$exec  = mysqli_query($conn,$query);

				    		if ($exec) {
				    			$count = mysqli_num_rows($exec);
				    			if ($count > 0) {
				    				$no = 0;
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				
				    	?>
						    			<tr>
											<td><?php echo ++$no; ?></td>
											<td><?php echo $rows['subject_code'] ?></td>
											<td><?php echo $rows['subject_name'] ?></td>
											<td>
												<a href="index.php?page=21&id=<?php echo $rows['subject_code'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
												<a href="include/delete_subject.php?id=<?php echo $rows['subject_name'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
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