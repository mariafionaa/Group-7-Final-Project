<h1>Add Lecturer</h1>

<?php  

    $query="select * from lecturer order by nip desc limit 1";
    $row=mysqli_query($conn,$query);
    if($row){
      if(mysqli_num_rows($row)>0){
        $auto=mysqli_fetch_array($row);
        $kode=$auto['nip'];
        $baru=substr($kode,3,7);
          //$nilai=$baru+1;
          $nol=(int)$baru;
      } 
      else{
        $nol=0;
        }
      $nol=$nol+1;
      $nol2="";
      $nilai=4-strlen($nol);
      for ($i=1;$i<=$nilai;$i++){
        $nol2= $nol2."0";
        }

        $kode2 ="117".$nol2.$nol;
        
    }
    else{
    echo mysqli_error();
    }
 

if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($nip == "") {
		array_push($err, "nip can't be empty");
		$valid = false;
	}

	if ($name == "") {
		array_push($err, "name can't be empty");
		$valid = false;
	}

	if ($address == "") {
		array_push($err, "address can't be empty");
		$valid = false;
	}

	if ($phone == "") {
		array_push($err, "phone can't be empty");
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("there can be no empty fields")</script>';
	}else{
		$query		=	"INSERT INTO lecturer VALUES(null, '$nip', '$name', '$address', '$phone')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Successfully add lecturer";
			echo '<script>window.location = "index.php?page=10"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['nip']);
	unset($_SESSION['name']);
	unset($_SESSION['address']);
	unset($_SESSION['phone']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" style="background-color: salmon">
                <h4 class="title">Add Lecturer</h4>
                <p class="category">Enter lecturer data correctly</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-primary btn-md pull-right" style="background-color: seagreen"><i class="fa fa-arrow-left"></i> Return</a>
                <h3 style="overflow: hidden;"><b>Lecturer Data</b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" class="form-control" readonly="readonly" name="nip" value="<?php echo $kode2 ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Lecturer's Name</label>
						<input type="text" class="form-control" name="name" value="<?php isset($_SESSION['name'])  ?  print($_SESSION['name']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Address</label>
						<textarea name="address" cols="20" rows="4" class="form-control"><?php isset($_SESSION['address'])  ?  print($_SESSION['address']) : ""; ?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="telp">Phone</label>
						<input type="text" class="form-control" name="phone" value="<?php isset($_SESSION['phone'])  ?  print($_SESSION['phone']) : ""; ?>">>
					</div>
					

					<button type="submit" name="submit" class="btn btn-primary pull-right" style="background-color: seagreen"><i class="fa fa-save"></i> &nbsp;Save</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Clear</button>
				</form>

            </div>
        </div>
    </div>
</div>
