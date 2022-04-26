<?php  

include '../auth.php';
include '../connection.php';

$role = "";

$id 	= $_SESSION['auth'];


if ($_SESSION['role_user'] == 0) {
	$role = "Admin";
    $query      = "SELECT * FROM account WHERE id = $id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
    
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }

}else{
	$role = "User";
    $query      = "SELECT a.*,b.* FROM registration a, account b WHERE a.id = $id AND b.id_user=$id";

    $exec       = mysqli_query($conn, $query);


    if ($exec) {
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }
}




$getPage = $_GET['page'];

switch ($getPage) {
	case 1:
		$page 				= "include/home.php";
		$_SESSION['active']	= "1";
		break;
	case 2:
		$page 				= "include/profile.php";
		$_SESSION['active']	= "2";
		break;
	case 3:
		$page 				= "include/edit_profile.php";
		$_SESSION['active']	= "2";
		break;
	case 4:
		$page 				= "include/registration_requirement.php";
		$_SESSION['active'] = "3";
		break;
	case 5:
		$page 				= "include/upload_birth_certificate.php";
		$_SESSION['active'] = "3";
		break;
	case 6:
		$page 				= "include/upload_photo2r.php";
		$_SESSION['active'] = "3";
		break;
	case 7:
		$page 				= "include/registration_confirmation.php";
		$_SESSION['active']	= "4";
		break;
    case 8:
        $page               = "include/registration_detail.php";
        $ida                = $_GET['ida'];
        $idd                = $_GET['idd'];
        $_SESSION['active'] = "4";
        break;
    case 9:
        $page               = "include/payment.php";
        $_SESSION['active'] = "5";
        break;
    case 10:
        $page               = "include/lecturer.php";
        $_SESSION['active'] = 6;
        break;
    case 11:
        $page               = "include/add_lecturer.php";
        $_SESSION['active'] = 6;
        break;
    case 12:
        $page               = "include/change_lecturer.php";
        $_SESSION['active'] = 6;
        $id                 = $_GET['id'];
        break;
    case 13:
        $page               = "include/registration_payment_review.php";
        $_SESSION['active'] = '5';
        break;
    case 14:
        $page               =  "include/user_payment_confirmation.php";
        $_SESSION['active'] = '7';
        break;
    case 15:
        $page               =  "include/registration_payment_confirmation.php";
        $_SESSION['active'] = '7';
        break;
    case 16:
        $page               = "include/confirm_payment_tuition.php";
        $_SESSION['active'] = '7';
        break;
    case 17:
        $page               = "include/confirm_payment_registration_admin.php";
        $_SESSION['active'] = '8';
        break;
    case 18:
        $page               = "include/subject.php";
        $_SESSION['active'] = "9";
        break;
    case 19:
        $page               = "include/add_subject.php";
        $_SESSION['active'] = "9";
        break;
    case 20:
        $page               = "include/change_subject.php";
        $_SESSION['active'] = "9";
        $id                 = $_GET['id'];
        break;
    case 21:
        $page               = "include/schedule.php";
        $_SESSION['active'] = "10";
        break;
    case 22:
        $page               = "include/add_schedule.php";
        $_SESSION['active'] = "10";
        $kelas              = $_GET['kelas'];
        break;
    case 23:
        $page               = "include/user_schedule.php";
        $_SESSION['active'] = "11";        
        break;
    case 24:
        $page               = "include/admin_tuition_payment_confirmation.php";
        $_SESSION['active'] = "12";
        break;
    case 25:
        $page               = "include/konfirmasi_pembayaran_kegiatan_admin.php";
        $_SESSION['active'] = "13";
        break;
    case 26:
        $page               = "include/konfirmasi_pembayaran_kegiatan.php";
        $_SESSION['active'] = "7";
        break;
	default:
		$page 	= "include/home.php";
		$_SESSION['active']	= "1";
		break;
}

?>

<!doctype html>
<html lang="en">
	
<head>
    
    <title>Dashboard <?php echo $role; ?></title>
	

    <?php  
    	include "include/libs.php";
    ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar.jpeg">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->
            <div class="logo">
                <a href="#" class="simple-text">
                    Welcome <?php $role == "Admin" ? print($name_admin) : print($nick_name); ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php $_SESSION['active'] == 1 ? print("active") : print("") ?>">
                        <a href="index.php?page=1">
                            <i class="material-icons">dashboard</i>
                            <p>Home</p>
                        </a>
                    </li>
					
					<?php  
					if ($role == "User") {
					?>
					<li class="<?php $_SESSION['active'] == 2 ? print("active") : print("") ?>">
                        <a href="index.php?page=2">
                            <i class="material-icons">person</i>
                            <p>User Profile </p>
                        </a>
                    </li>
					<?php
					}
					?>

                    
                    <?php  
					if ($role == "Admin") {
					?>
					<li class="<?php $_SESSION['active'] == 4 ? print("active") : print("") ?>">
                        <a href="index.php?page=7">
                            <i class="material-icons">content_paste</i>
                            <p>Payment Confirmation </p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 6 ? print("active") : print("") ?>">
                        <a href="index.php?page=10">
                            <i class="material-icons">supervisor_account</i>
                            <p>Lecturer</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 8 ? print("active") : print("") ?>">
                        <a href="index.php?page=17">
                            <i class="material-icons">supervisor_account</i>
                            <p>Registration Payment Confirmation</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 12 ? print("active") : print("") ?>">
                        <a href="index.php?page=25">
                            <i class="material-icons">supervisor_account</i>
                            <p>Tuition Payment Confirmation</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 13 ? print("active") : print("") ?>">
                        <a href="index.php?page=26">
                            <i class="material-icons">subject</i>
                            <p>Konfirmasi Pembayaran Kegiatan</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 9 ? print("active") : print("") ?>">
                        <a href="index.php?page=19">
                            <i class="material-icons">subject</i>
                            <p>Subject</p>
                        </a>
                    </li>

                    <li class="<?php $_SESSION['active'] == 10 ? print("active") : print("") ?>">
                        <a href="index.php?page=22">
                            <i class="material-icons">subject</i>
                            <p>Schedule</p>
                        </a>
                    </li>
					<?php
					}
					?>
                    
                    <?php  
                    if ($role == "User") {
                    ?>
                    <li class="<?php $_SESSION['active'] == 3 ? print("active") : print("") ?>">
                        <a href="index.php?page=4">
                            <i class="material-icons">content_paste</i>
                            <p>Registration Requirement</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 5 ? print("active") : print("") ?>">
                        <a href="index.php?page=9">
                            <i class="material-icons">library_books</i>
                            <p>Payment</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 7 ? print("active") : print("") ?>">
                        <a href="index.php?page=14">
                            <i class="material-icons">library_books</i>
                            <p>Payment Confirmation</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 11 ? print("active") : print("") ?>">
                        <a href="index.php?page=24">
                            <i class="material-icons">library_books</i>
                            <p>Schedule</p>
                        </a>
                    </li>
                    
                    
                    <?php
                    }
                    ?>

                    
                    
                
                    <li>
                        <a href="../logout.php">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Logout</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                   
                   <?php  

                   include $page;

                   ?>
                        
                </div>
            </div>
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer> -->
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>

<script>
    $(document).ready(function(){
        $("#print").click(function(){
            window.print();
        });
    });
</script>

</html>