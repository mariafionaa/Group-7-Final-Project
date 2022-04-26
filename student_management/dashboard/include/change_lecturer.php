<h1>Change Data Lecturer</h1>

<?php  

$query 		=	"SELECT * FROM lecturer where id = $id";

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

	if ($nip == "") {
		$valid = false;
	}

	if ($name == "") {
		$valid = false;
	}

	if ($address == "") {
		$valid = false;
	}

	if ($phone == "") {
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("there can be no empty fields")</script>';
	}else{
		$query		=	"UPDATE lecturer 
						SET lecturer_name = '$name', address = '$address', phone = '$phone' 
						WHERE id=$id";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Successfully added a teacher";
			echo '<script>window.location = "index.php?page=10"</script>';
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
                <h4 class="title">Change Data Lecturer</h4>
                <p class="category">Enter lecturer data correctly</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i>Return</a>
                <h3 style="overflow: hidden;"><b>Lecturer Data</b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" class="form-control" readonly="readonly" name="nip" value="<?php echo $data['nip']?>">
					</div>

					<div class="form-group floating-label">
						<label for="name">Lecturer Name</label>
						<input type="text" class="form-control" name="name" value="<?php echo $data['lecturer_name'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="name">Address</label>
						<textarea name="address" cols="20" rows="4" class="form-control"><?php echo $data['address']?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" name="phone" value="<?php echo $data['phone'] ?>">>
					</div>
					

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>