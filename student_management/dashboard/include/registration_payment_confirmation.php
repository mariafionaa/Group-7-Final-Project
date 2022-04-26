<h2>Registration Payment Confirmation</h2>

<?php  

$queryx     =   "SELECT * FROM registration_detail WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $registration = mysqli_fetch_array($execx);

}else{
    echo 'error';
}	

$idetail    =   $regist['id'];
$class      =   $regist['class'];
$id_user    =   $regist['id_user'];

if (isset($_POST['upload'])) {
    $baseFolderTarget    = "../assets/uploads/";

    $fileNameProof    = date("h-m-s").basename( $_FILES['proof']['name']);
    
    $foldertarget   = $baseFolderTarget . $fileNameProof;
    
    $payment_date =   date("Y-m-d");

    $ok=1;

    $file_type=$_FILES['proof']['type'];



    if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="application/pdf") {
        if(move_uploaded_file($_FILES['proof']['tmp_name'], $foldertarget))

         {

            $query  = "UPDATE registration_detail SET regist_status=2 WHERE id_user=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {

                if ($regist['regist_payment_method'] == "L") {

                    $budget =   0;

                    if (class == "1, 2, 3, 4, 5") {
                        $budget =   47000000;
                    }else{
                        $budget = 0;
                    }

                    $query2 =   "INSERT INTO registration_installment
                            VALUES(null, '$fileNameProof', $idetail, $budget, '$payment_date', 0,1)";
                    $exec2   =   mysqli_query($conn, $query2);

                    $queryFirstTuitionInstallment    =   "INSERT INTO tuition_payment VALUES(null, '$payment_date', 1, 1, $id_user)";

                    $execFirstTuitionInstallment     = mysqli_query($conn, $queryFirstTuitionInstallment);


                    if ($exec2 && $execFirstTuitionInstallment) {
                        echo "<div class='alert alert-success alert-dismissable'>
                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                          <strong>Succeed!</strong> Upload proof of registration payment.
                        </div>";  
                    }else{
                        echo mysqli_error($conn);
                    }
                }else{
                    


                    $queryCountInstallment  =   "SELECT * FROM installment_registration WHERE regist_detail_id=$idetail";
                    $execCountInstallment   =   mysqli_query($conn, $queryCountInstallment);

                    if ($execCountInstallment) {
                        $count          =   mysqli_num_rows($execCountInstallment);

                        ++$count;

                        $nominal            =   0;

                        if ($count >= 2) {
                           
                            if ($class == "1, 2, 3, 4, 5") {
                                $nominal = 47000000;
                            }else{
                                $nominal = 0;
                            }
                        }else{
                           if ($class == "1, 2, 3, 4, 5") {
                                $nominal = 8000000;
                            }else{
                                $nominal = 0;
                            } 
                        }


                        $query2         =   "INSERT INTO registration_installment
                                            (payment_proof, regist_detail_id, nominal, payment_date, installment_no)
                                            VALUES('$fileNameProof', $idetail, $nominal, '$payment_date',$count)";
                        $exec2          =   mysqli_query($conn, $query2);

                        if ($count < 2) {
                            $queryFirstTuitionInstallment    =   "INSERT INTO tuition_payment VALUES(null, '$payment_date', 1, 1, $user_id)";

                            $execFirstTuitionInstallment     = mysqli_query($conn, $queryFirstTuitionInstallment);
                        }

                        if ($exec2) {
                            echo "<div class='alert alert-success alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Succeed!</strong> Upload Birth Certificate(PDF).
                            </div>";  
                        }else{
                            echo mysqli_error($conn);
                        }

                    }else{
                        echo mysqli_erorr($conn);
                    }

                }
              
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
                <h4 class="title">Registration Payment Confirmation</h4>
                <p class="category">Upload proof of payment in the specified format (PNG/JPEG/PDF)</p>
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


