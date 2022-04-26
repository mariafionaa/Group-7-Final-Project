<?php  
    //start the session
    session_start();

    if (!isset($_SESSION)) {
        echo 'there is';
        exit();
        //echo'<script> window.location="index.php"; </script> ';
    }

    $_SESSION['is_data_parent_exist'] = "";
    $_SESSION['is_data_student_exist'] = "";
    $_SESSION['is_data_account_exist'] = "";

    if(isset($_POST['submit'])){
        foreach ($_POST as $key => $val) {
            ${$key} = $val;
            $_SESSION[''.$key.''] = $val;
        }

        if (!empty($_SESSION)) {
            echo'<script> window.location="parents_data_regist.php"; </script> ';
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
                        <h4 class="title">Registration Requirement</h4>
                        <p class="category">Fill in the registration form correctly</p>
                    </div>
                    <div class="card-content">
                        <h3>The following are the requirements for new student registration that must be met:</h3>
                        <ol>
                            <li><font color="#2ecc71">Fill out the Registration Form<i class="fa fa-check"></font></i></li>
                            <li>Photocopy of birth certificate and family card</li>
                            <li>Photos of children and family photos (size 2R)</li>
                        </ol>

                        <h6><i><b>*Note: Return of the form along with the requirements no later than 2 weeks after filling out the online form</b></i></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
                <div class="card" style="margin-top: 50px">
                    <div class="card-header" style="background-color: salmon">
                        <h4 class="title">Registrant Data</h4>
                        <p class="category">Check your data below, make sure it's correct</p>
                    </div>
                    <div class="card-content table-responsive">
                        
                        <a href="new_student_regist.php" class="btn btn-primary pull-right" style="background-color: seagreen"><i class="fa fa-pencil"></i> Edit Data</a>
                        <h3 style="overflow: hidden;"><b>New Student Data</b></h3>
                        <table class="table table-hover">
                        
                            <tbody>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>:<?php isset($_SESSION['email'])  ?  print($_SESSION['email']) : ""; ?> <a href="regist_account.php" class="btn btn-sm btn-primary" style="background-color: seagreen"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td>: <?php isset($_SESSION['full_name'])  ?  print($_SESSION['full_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nickname</b></td>
                                    <td>: <?php isset($_SESSION['nick_name'])  ?  print($_SESSION['nick_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Birth Place / Date</b></td>
                                    <td>: <?php isset($_SESSION['birth_place'])  ?  print($_SESSION['birth_place']) : ""; ?>, <?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : "2003-01-01"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Gender</b></td>
                                    <td>: <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "M" ? print("Male") : print("Female") ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Child No</b></td>
                                    <td>: <?php isset($_SESSION['child_number'])  ?  print($_SESSION['child_number']) : ""; ?> of <?php isset($_SESSION['child_total'])  ?  print($_SESSION['child_total']) : ""; ?> siblings</td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="parents_data_regist.php" class="btn btn-primary pull-right" style="margin-top: 30px; background-color: seagreen"><i class="fa fa-pencil"></i> Edit Data</a>


                        
                        
                        <h3><b>Parents Data</b></h3>
                        <table class="table table-hover">
                        
                            <tbody>
                                <tr>
                                    <td><b>Father's Name</b></td>
                                    <td>: <?php isset($_SESSION['father_name'])  ?  print($_SESSION['father_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Birth Place / Date</b></td>
                                    <td>: <?php isset($_SESSION['birth_place_father'])  ?  print($_SESSION['birth_place_father']) : ""; ?>, <?php isset($_SESSION['birth_date_father'])  ?  print($_SESSION['birth_date_father']) : "1980-01-01"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Last Education</b></td>
                                    <td>: <?php isset($_SESSION['father_last_education'])  ?  print($_SESSION['father_last_education']) : ""; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Occupation</b></td>
                                    <td>: <?php isset($_SESSION['father_job'])  ?  print($_SESSION['father_job']) : ""; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Religion</b></td>
                                    <td>: <?php isset($_SESSION['father_religion'])  ?  print($_SESSION['father_religion']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Mother's Name</b></td>
                                    <td>: <?php isset($_SESSION['mother_name'])  ?  print($_SESSION['mother_name']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Birth Place / Date</b></td>
                                    <td>: <?php isset($_SESSION['birth_place_mother'])  ?  print($_SESSION['birth_place_mother']) : ""; ?>, <?php isset($_SESSION['birth_date_mother'])  ?  print($_SESSION['birth_date_mother']) : "1980-01-01"; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Last Education</b></td>
                                    <td>: <?php isset($_SESSION['mother_last_education'])  ?  print($_SESSION['mother_last_education']) : ""; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Occupation</b></td>
                                    <td>: <?php isset($_SESSION['mother_job'])  ?  print($_SESSION['mother_job']) : ""; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Religion</b></td>
                                    <td>: <?php isset($_SESSION['mother_religion'])  ?  print($_SESSION['mother_religion']) : ""; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Phone</b></td>
                                    <td>: <?php isset($_SESSION['phone'])  ?  print($_SESSION['phone']) : ""; ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>
                        <h3>Are you sure the data above is correct?</h3>
                        <a href="save_registration_process.php" class="btn btn-primary pull-right" style="background-color: seagreen">Yes, send registration data</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>