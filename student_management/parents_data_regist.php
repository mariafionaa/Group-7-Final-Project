<?php  
	//start the session
	session_start();

    $redirect = "";
    
    if (isset($_SESSION['is_data_parent_exist'])) {
        $redirect = "<script> window.location='regist_requirement.php'; </script>";
    }else{
        $redirect = "<script> window.location='regist_requirement.php'; </script>";
    }

    if(isset($_POST['submit'])){
        foreach ($_POST as $key => $val) {
            ${$key} = $val;
            $_SESSION[''.$key.''] = $val;
        }

        if (!empty($_SESSION)) {
            echo $redirect;
            print_r($_SESSION);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>New Student Admission</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/main.css">

</head>
<body>
	<div class="container">

	    <div class="row">
	        <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">

				<div class="card" style="margin-top: 50px">
                    <div class="card-header" style="background-color: salmon">
                        <h4 class="title">Parents Data</h4>
                        <p class="category">Fill in the registration form correctly</p>
                    </div>
                    <div class="card-content">
                        <form method="post" action="parents_data_regist.php">
                            
                            <fieldset class="the-fieldset">
                                <legend class="the-legend">Father's Data</legend>
                                <!-- Father data form input -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Father's Name</label>
                                        <input type="text" class="form-control" name="father_name" required 
                                        value="<?php isset($_SESSION['father_name'])  ?  print($_SESSION['father_name']) : ""; ?>"
                                        autofocus>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Father's Birth Place</label>
                                        <input type="text" class="form-control" name="birth_place_father" 
                                        value="<?php isset($_SESSION['birth_place_father'])  ?  print($_SESSION['birth_place_father']) : ""; ?>"
                                        required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Father's Birth Date</label>
                                        <input type="date" class="form-control" name="birth_date_father" 
                                        value="<?php isset($_SESSION['birth_date_father'])  ?  print($_SESSION['birth_date_father']) : print("1980-01-01"); ?>"
 required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last Education</label>
                                        <input type="text" class="form-control" name="father_last_education" required
                                        value="<?php isset($_SESSION['father_last_education'])  ?  print($_SESSION['father_last_education']) : ""; ?>"
                                        >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Occupation</label>
                                        <input type="text" class="form-control" name="father_job" required
                                        value="<?php isset($_SESSION['father_job'])  ?  print($_SESSION['father_job']) : ""; ?>"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Religion</label>
                                        <input type="text" class="form-control" name="father_religion" 
                                        value="<?php isset($_SESSION['father_religion'])  ?  print($_SESSION['father_religion']) : ""; ?>"

                                        required>
                                    </div>
                                </div>
                            </div>
                            <!-- END Father data form input -->
                            </fieldset>

                            

                            
                                
                            <fieldset class="the-fieldset" style="margin-top: 20px">
                                <legend class="the-legend">Mother's Data</legend>
                            <!-- Mother data form input -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Mother's Name</label>
                                        <input type="text" class="form-control" name="mother_name" required 
value="<?php isset($_SESSION['mother_name'])  ?  print($_SESSION['mother_name']) : ""; ?>"

                                        autofocus>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Mother's Birth Place</label>
                                        <input type="text" class="form-control" name="birth_place_mother"
value="<?php isset($_SESSION['birth_place_mother'])  ?  print($_SESSION['birth_place_mother']) : ""; ?>"

                                         required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Mother's Birth Date</label>
                                        <input type="date" class="form-control" name="birth_date_mother"  
value="<?php isset($_SESSION['birth_date_mother'])  ?  print($_SESSION['birth_date_mother']) : print("1980-01-01"); ?>"

                                        required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last Education</label>
                                        <input type="text" class="form-control" name="mother_last_education"
value="<?php isset($_SESSION['mother_last_education'])  ?  print($_SESSION['mother_last_education']) : ""; ?>"

                                         required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Occupation</label>
                                        <input type="text" class="form-control" name="mother_job" 
value="<?php isset($_SESSION['mother_job'])  ?  print($_SESSION['mother_job']) : ""; ?>"

                                        required>
                                    </div>
                                </div>
                            </div>
                            
                            

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Religion</label>
                                        <input type="text" class="form-control" name="mother_religion" 
value="<?php isset($_SESSION['mother_religion'])  ?  print($_SESSION['mother_religion']) : ""; ?>"

                                        required>
                                    </div>
                                </div>
                            </div>
                            <!-- END Mother data form input -->
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" 
value="<?php isset($_SESSION['phone'])  ?  print($_SESSION['phone']) : ""; ?>"

                                        required>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                            
                            <?php  
                            if (isset($_SESSION['is_data_parent_exist'])) {
                            ?>
                                <button type="submit" name="submit" class="btn btn-primary pull-right">Return <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }else{
                            ?>
                                <a href="new_student_regist.php" class="btn btn-warning pull-left"><i class="fa fa-arrow-left"></i> Return</a>
                                <button type="submit" name="submit" class="btn btn-primary pull-right" style="background-color: seagreen">Next <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }
                            ?>

                            
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
	    </div>
	</div>
</body>
</html>