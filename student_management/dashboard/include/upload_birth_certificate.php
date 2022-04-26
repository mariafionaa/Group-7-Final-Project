<?php  

include '../connection.php';

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameBC   = date("h-m-s").basename( $_FILES['birth_certificate']['name']);
    $fileNameFC   = date("h-m-s").basename( $_FILES['family_card']['name']);

    $targetfolder   = $targetfolderBase . $fileNameBC;
    $targetfolder2  = $targetfolderBase . $fileNameFC;
    
    
    $ok=1;

    $file_type=$_FILES['birth_certificate']['type'];
    $file_type2=$_FILES['family_card']['type'];

    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg") {

         if(move_uploaded_file($_FILES['birth_certificate']['tmp_name'], $targetfolder))

         {

            $query  = "UPDATE registration SET upload_birth_certificate='$fileNameBC' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
             echo "<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Success!</strong>Upload Birth Certificate(PDF, JPEG, PNG).
            </div>";   
            }
             
         }

         else {

         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Failed!</strong>Upload Birth Certificate(PDF, JPEG, PNG).
        </div>";

         }

        }

    else {

     echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Failed!</strong>Upload Birth Certificate must be in the format(.PDF, JPEG, PNG).
        </div>";

    }

    if ($file_type2=="application/pdf" || $file_type2=="image/png" || $file_type2=="image/jpeg") {
        if(move_uploaded_file($_FILES['family_card']['tmp_name'], $targetfolder2))

         {

            $query  = "UPDATE registration SET upload_family_card='$fileNameFC' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
                echo "<div class='alert alert-success alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Success!</strong>Upload Family Card(PDF, JPEG, PNG).
                </div>";                
            }


         }

         else {

         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Failed!</strong>Upload Family Card(PDF, JPEG, PNG).
        </div>";

         }
    }else{
        echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong>Upload Family Card must be in the format(PDF, JPEG, PNG).
        </div>";
    }
    
    
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Upload Birth Certificate(PDF, JPEG, PNG) dan Family Card(PDF, JPEG, PNG)</h4>
                <p class="category">Upload with the correct format(PDF, JPEG, PNG)</p>
                <a href="index.php?page=4" class="btn btn-primary btn-md pull-right" style="margin-top: -40px;"><i class="fa fa-arrow-left"></i> Return</a>
            </div>
            <div class="card-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        

                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Birth Certificate(PDF, JPEG, PNG) : </label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" name="birth_certificate" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)">
                                Upload Birth Certificate (PDF, JPEG, PNG)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Family Card(PDF, JPEG, PNG) : </label>
                            <label class="btn btn-primary" for="my-file-selector2">
                                <input id="my-file-selector2" name="family_card" type="file" style="display:none" 
                                onchange="$('#upload-file-info2').html(this.files[0].name)">
                                Upload Family Card (PDF, JPEG, PNG)
                            </label>
                            <span class='label label-info' id="upload-file-info2"></span>
                        </div>
                    </div>
                       
                    <hr> 

                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div>