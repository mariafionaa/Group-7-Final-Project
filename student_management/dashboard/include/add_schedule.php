<h1>Add Schedule</h1>

<?php  ;
if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($subject == "") {
		array_push($err, " ");
		$valid = false;
	}

	if ($day == "") {
		array_push($err, "day must be chosen");
		$valid = false;
	}

	
	if ($valid == false) {
		echo '<script>alert("there can be no empty fields")</script>';
	}else{
		$query		=	"INSERT INTO schedule VALUES(null,$day, '$subject','$class')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Successfully added Schedule";
			echo '<script>window.location = "index.php?page=22"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['day']);
	unset($_SESSION['subject']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Add Schedule<?php echo $class; ?></h4>
                <p class="category">Enter Schedule Data Correctly</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=22" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Return</a>
                <h3 style="overflow: hidden;"><b>Schedule Data</b></h3>
				
				<form action="" method="post">
					
					<div class="form-group floating-label">
						<label for="subject">Subject</label>
						<select name="subject" id="mapel" class="form-control">
							<option value="" selected disabled>-- Choose Subject --</option>
							<?php  
							$querySubject	=	"SELECT * FROM subject";
							$execSubject	=	mysqli_query($conn, $querySubject);
							if ($execSubject) {
								while ($subject = mysqli_fetch_array($execSubject)) {
							?>
								<option value="<?php echo $subject['subject_code'] ?>"><?php echo $subject['subject_code'] ?> - <?php echo $subject['subject_name'] ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>

					<div class="form-group floating-label">
						<label for="day">Day</label>
						<select name="day" id="mapel" class="form-control">
							<option value="" selected disabled>-- Choose Day --</option>
							<?php  
							$querySubject	=	"SELECT * FROM day";
							$execSubject	=	mysqli_query($conn, $querySubject);
							if ($execSubject) {
								while ($subject = mysqli_fetch_array($execSubject)) {
							?>
								<option value="<?php echo $subject['id'] ?>"><?php echo $subject['day_name'] ?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
					
					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Save</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Clear</button>
				</form>
            </div>
        </div>
    </div>
</div>