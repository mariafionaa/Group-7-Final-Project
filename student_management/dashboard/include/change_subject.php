<h1>Change Student Data</h1>

<?php  
$query 		=	"SELECT * FROM subject where subject_code = '$id'";

$exec  		= 	mysqli_query($conn, $query);

if ($exec) {
	$data 	= mysqli_fetch_array($exec);
}else{
	echo mysqli_error($conn);
}


if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
	}

	if ($subject_code == "") {
		$valid = false;
	}

	if ($name == "") {
		$valid = false;
	}

	
	if ($valid == false) {
		echo '<script>alert("there can be no empty fields")</script>';
	}else{
		$query		=	"UPDATE subject 
						SET subject_name = '$name' 
						WHERE subject_code='$id'";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "successfully changed the subject data";
			echo '<script>window.location = "index.php?page=19"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Change Subject Data</h4>
                <p class="category">Enter subject data correctly</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Return</a>
                <h3 style="overflow: hidden;"><b>Student Data</b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="subject_code">Subject Code</label>
						<input type="text" class="form-control" readonly="readonly" name="subject_code" value="<?php echo $data['subject_code']?>">
					</div>

					<div class="form-group floating-label">
						<label for="name">Subject Name</label>
						<input type="text" class="form-control" name="name" value="<?php echo $data['subject_name'] ?>">
					</div>

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Save</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Clear</button>
				</form>

            </div>
        </div>
    </div>
</div>
