<?php  

$queryAccount 	=	"SELECT * FROM account WHERE id_user=$ida";
$queryRegist	=	"SELECT * FROM registration WHERE id=$idd";
$queryDetail	= 	"SELECT * FROM registration_detail WHERE id_user=$idd";

$execAccount		= mysqli_query($conn,$queryAccount);
$execRegist		= mysqli_query($conn,$queryRegist);
$execDetail		= mysqli_query($conn,$queryDetail);

$account 			= array();

if ($execAccount && $execRegist && $execDetail) {
	$account 		= mysqli_fetch_array($execAccount);
	$regist 	= mysqli_fetch_array($execRegist);
	$detail 	= mysqli_fetch_array($execDetail);
}else{
	echo mysqli_error($conn);
}

?>


<h2>Registration Detail</h2>

<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
<div class="card" style="margin-top: 50px">
<div class="card-header" data-background-color="blue">
<h4 class="title">Registrant Biodata</h4>
<p class="category">Check your data below, make sure it's correct</p>
</div>
<div class="card-content table-responsive">

<h3 style="overflow: hidden;"><b>Student Data</b></h3>
<table class="table table-hover">

    <tbody>
        <tr>
            <td><b>Email</b></td>
            <td>: <?php echo $account['email']; ?> </td>
        </tr>
        <tr>
            <td><b>Name</b></td>
            <td>: <?php echo $regist['name']; ?></td>
        </tr>
        <tr>
            <td><b>Nickname</b></td>
            <td>: <?php echo $regist['nick_name'];; ?></td>
        </tr>
        <tr>
            <td><b>Birth Place and Date</b></td>
            <td>: <?php echo $regist['birth_place'].", ".$regist['birth_date'];; ?></td>
        </tr>
        <tr>
            <td><b>Gender</b></td>
            <td>: <?php echo $regist['gender']; ?></td>
        </tr>
        
        <tr>
            <td><b>Child No</b></td>
            <td>: <?php echo $regist['child_number']." of ".$regist['child_total']?> siblings</td>
        </tr>
    </tbody>
</table>


<h3><b>Parents Data</b></h3>
<table class="table table-hover">

    <tbody>
        <tr>
            <td><b>Father's Name</b></td>
            <td>: <?php echo $regist['father_name']; ?></td>
        </tr>
        <tr>
            <td><b>Birth Place and Date</b></td>
            <td>: <?php echo $regist['birth_place_father'].", ".$regist['birth_date_father']; ?></td>
        </tr>
        <tr>
            <td><b>Last Education</b></td>
            <td>: <?php echo $regist['father_last_education'];; ?></td>
        </tr>
        
        <tr>
            <td><b>Occupation</b></td>
            <td>: <?php echo $regist['father_job']; ?></td>
        </tr>
        
        <tr>
            <td><b>Religion</b></td>
            <td>: <?php echo $regist['father_religion']; ?></td>
        </tr>
        <tr>
            <td><b>Mother's Name</b></td>
            <td>: <?php echo $regist['mother_name']; ?></td>
        </tr>
        <tr>
            <td><b>Birth Place and Date</b></td>
            <td>: <?php echo $regist['birth_place_mother'].", ".$regist['birth_date_mother']; ?></td>
        </tr>
        <tr>
            <td><b>Last Education</b></td>
            <td>: <?php echo $regist['mother_last_education']; ?></td>
        </tr>
        
        <tr>
            <td><b>Occupation</b></td>
            <td>: <?php echo $regist['mother_job']; ?></td>
        </tr>
        
        <tr>
            <td><b>Religion</b></td>
            <td>: <?php echo $regist['mother_religion']; ?></td>
        </tr>
        <tr>
            <td><b>Phone</b></td>
            <td>: <?php echo $regist['phone']; ?></td>
        </tr>
    </tbody>
</table>

<h3><b>Download</b></h3>

<ol>
	<li>Birth Certificate <a href="<?php echo '../assets/uploads/'.$regist['upload_birth_certificate'];  ?>" title="Download Birth Certificate"><i class="fa fa-download"></i></a></li>
	<li>Family Card <a href="<?php echo '../assets/uploads/'.$regist['upload_family_card'];  ?>" title="Download Family Card"><i class="fa fa-download"></i></a></li>
	<li>Child Photo <a href="<?php echo '../assets/uploads/'.$regist['child_photo'];  ?>" title="Download Child Photo"><i class="fa fa-download"></i></a></li>
</ol>

<hr>
<h3>Do Confirm Registration?</h3>
<a href="include/registration_confirmation_process.php?idd=<?php echo $idd; ?>" class="btn btn-primary pull-right"><i class="fa fa-check"></i>  Confirm Registration</a>