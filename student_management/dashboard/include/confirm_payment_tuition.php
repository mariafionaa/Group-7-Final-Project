<h2>Tuition Payment Confirmation</h2>


<?php  

$queryx     =   "SELECT * FROM registration_detail WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $regist = mysqli_fetch_array($execx);

}else{
    echo 'failed';
}   

$idetail    =   $regist['id'];
$class      =   $regist['class'];
$id_user    =   $regist['id_user'];

if (isset($_POST['upload'])) {
    $baseFolderTarget    = "../assets/uploads/";

    $fileNameProof   = date("h-m-s").basename( $_FILES['proof']['name']);
    
    $foldertarget   = $baseFolderTarget . $fileNameProof;
    
    $payment_date =   date("Y-m-d");

    $ok=1;

    $file_type=$_FILES['proof']['type'];



    if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="application/pdf") {
        if(move_uploaded_file($_FILES['proof']['tmp_name'], $foldertaget)){

            
            $queryInstallmentCount  =   "SELECT COUNT(instalment_no) as installmentCount FROM tuition_payment WHERE id_user=$id";
            $execInstallmentCount   =   mysqli_query($conn, $queryInstallmentCount);

            if ($execInstallmentCount) {
                $countInstallment   =   mysqli_fetch_array($execInstallmentCount);
                $installmentCount   =   $countInstallment['installmentCount'];
            }else{
                echo mysqli_error($conn);
            }

                
        
            $installmentCount++;

            $date   = date("Y-m-d");

            $queryInsertToTuition   =   "INSERT INTO tuition_payment VALUES(null, '$date', $installmentCount, 0,$id)";
            $execInsertToTuition    =   mysqli_query($conn, $queryInsertToTuition);

            if ($execInsertToTuition) {
                echo "<div class='alert alert-success alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Succeed</strong> Upload proof of registration payment.
                </div>";
            }else{
                echo mysqli_error($conn);
            }
              
        }else{
            echo "<div class='alert alert-danger alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Failed!</strong> Upload error occurred.
            </div>";
        }
    }else{
         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Failed!</strong> Incorrect format. must be in PNG/JPEG/PDF format.
        </div>";
    }
	
}
?>

<a href="index.php?page=14" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Return</a>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tuition Payment Confirmation</h4>
                <p class="category">Payment confirmation list</p>
            </div>
            <div class="card-content">
            	
            	<form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        

                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Proof of Payment/Transfer Receipt (PNG/JPEG/PDF) : </label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" name="bukti" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)">
                                upload proof of payment (PNG/JPEG/PDF)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                        
                    
                    </div>
                    
                    
                    
                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            
            
            </div>
        </div>
    </div>
</div>