<?php  
	//start the session
	session_start();

	$redirect = "";

	if (isset($_SESSION['is_data_student_exist'])) {
		$redirect = "<script> window.location='regist_requirement.php'; </script>";
	}else{
		$redirect = "<script> window.location='parents_data_regist.php'; </script>";
	}

	//check if button next is clicked
	if(isset($_POST['submit'])){

		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
			$_SESSION[''.$key.''] = $val;
		}

		//check if session is not empty, then redirect to parents_data_regist.php
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
                        <h4 class="title">New Student Data</h4>
                        <p class="category">Fill in the registration form correctly</p>
                    </div>
                    <div class="card-content">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" required autofocus
                                        value="<?php isset($_SESSION['full_name'])  ?  print($_SESSION['full_name']) : ""; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nickname</label>
                                        <input type="text" class="form-control" name="nick_name" required
                                        value="<?php isset($_SESSION['nick_name'])  ?  print($_SESSION['nick_name']) : ""; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Birth place</label>
                                        <input type="text" class="form-control" name="birth_place" required
                                        value="<?php isset($_SESSION['birth_place'])  ?  print($_SESSION['birth_place']) : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Birth date</label>
                                        <input type="date" class="form-control" name="birth_date" value="<?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : print("2003-01-01"); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Gender</label>
                                        <select name="gender" class="form-control">
                                        	<option value="" disabled selected>-- Choose Gender --</option>
										
                                        	<option value="M" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "M" ? print("selected") : "" ?>>Male</option>
                                        	<option value="F" <?php isset($_SESSION['gender']) && $_SESSION['gender'] == "F" ? print("selected") : "" ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
                                    <div class="form-group label-floating">Child No</label>
                                        <input type="number" class="form-control" name="child_number" 
										value="<?php isset($_SESSION['child_number'])  ?  print($_SESSION['child_number']) : ""; ?>" 
                                        required>
                                    </div>
                    
                                </div>

                              	<div class="col-md-6">
                              		<div class="form-group label-floating">
                                        <label class="control-label">Number of Sibling</label>
                                        <input type="number" class="form-control" name="child_total" 
										value="<?php isset($_SESSION['child_total'])  ?  print($_SESSION['child_total']) : ""; ?>"
                                        required>
                                    </div>
                              	</div>	
                            </div>
                            
                            
                            <?php  
                            if (isset($_SESSION['is_data_student_exist'])) {
                            ?>
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Return <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }else{
                            ?>
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