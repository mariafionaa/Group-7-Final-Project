<?php  
	ini_set ("display_errors", "1");
    error_reporting(E_ALL);
    
    include 'connection.php';

    $redirect = "";


	//check if button next is clicked
	if(isset($_POST['submit'])){


		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
		}

        $query  =   "SELECT email FROM account WHERE email='$email'";

        $exac   = mysqli_query($conn, $query);

        if ($exac) {
            $email_count = mysqli_num_rows($exac);
            if ($email_count > 0) {
                echo '<script>alert("Email already used, please use another email...")</script>';
            }else{
                $cost = 10;
                $hash = password_hash($password,PASSWORD_BCRYPT,["cost" => $cost]);

                
                $queryInsert = "INSERT INTO account VALUES(null, '$email', '$hash', '$name', 0, null)";
                $execQueryInsert = mysqli_query($conn,$queryInsert);


                if ($execQueryInsert) {
                    echo 'can';
                    //check if session is not empty, then redirect to parent_data_regist.php
                                          
                    echo '<script>alert("successfully registered")</script>';
                    echo "<script> window.location='login.php'</script>";
                
                }else{
                    echo 'there is';
                    echo mysqli_error($conn);
                }

                
            }
        }else{
            echo mysqli_error($conn);
        }   
	   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Registration</title>
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


    <script src="assets/js/jquery-3.2.1.min.js"></script>

</head>
<body>
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">

				<div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Data Admin</h4>
                        <p class="category">Fill in the admin registration form correctly, it will be used to log in as an admin</p>
                    </div>
                    <div class="card-content">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Admin Name</label>
                                        <input type="text" class="form-control" name="name" required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control" id="pass" name="password" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Password Confirmation</label>
                                        <input type="password" class="form-control" id="kpass" name="password_confirmation" required>
                                        <font id="err" color="red">Confirm Password is not the same as password</font>
                                    </div>
                                </div>
                            </div>

                            
							<button type="submit" id="btnsb" name="submit" class="btn btn-primary pull-right">Register <i class="fa fa-arrow-right"></i></button>
                            
                            
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
	    </div>
	</div>
</body>
</html>

<script>
    $(document).ready(function() {
        $err = $("#err");
        $btn = $("#btnsb");
        $err.hide();
        
        $(':input[type="submit"]').prop('disabled', true);

        $("#kpass").on("change paste keyup",function(event) {
            /* Act on the event */
            event.preventDefault();
            var pass = $("#pass").val();
            var dpass = $("#kpass").val();
        
            if (pass != dpass) {
                $err.show();
                $(':input[type="submit"]').prop('disabled', true);
            }else{
                $(':input[type="submit"]').prop('disabled', false);
                $err.hide();
            }

        });
    });
</script>