<h1>Add Subject</h1>

<?php  

    $query="select * from subject order by subject_code desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['subject_code'];
        $baru=substr($kode,2,4);
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

        $kode2 ="P".$nol2.$nol;
        
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

	if ($subject_code == "") {
		array_push($err, "subject_code can't be empty");
		$valid = false;
	}

	if ($nama == "") {
		array_push($err, "name can't be empty");
		$valid = false;
	}

	
	if ($valid == false) {
		echo '<script>alert("there can be no empty fields")</script>';
	}else{
		$query		=	"INSERT INTO subject VALUES('$subject_code', '$name')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Successfully added subject";
			echo '<script>window.location = "index.php?page=19"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['subject_code']);
	unset($_SESSION['name']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Add Subject</h4>
                <p class="category">Enter the Subject data correctly</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=19" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Subject Data</b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="subject_code">Subject Code</label>
						<input type="text" class="form-control" readonly="readonly" name="subject_code" value="<?php echo $kode2 ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Subject Name</label>
						<input type="text" class="form-control" name="name" value="<?php isset($_SESSION['name'])  ?  print($_SESSION['name']) : ""; ?>">
					</div>

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Save</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i>Clear</button>
				</form>

            </div>
        </div>
    </div>
</div>