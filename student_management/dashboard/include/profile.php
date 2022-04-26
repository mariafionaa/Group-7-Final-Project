<h2>Profile</h2>

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
            <td>: <?php echo $email; ?> </td>
        </tr>
        <tr>
            <td><b>Name</b></td>
            <td>: <?php echo $name; ?></td>
        </tr>
        <tr>
            <td><b>Nickname</b></td>
            <td>: <?php echo $nick_name;; ?></td>
        </tr>
        <tr>
            <td><b>Birth Place and Date</b></td>
            <td>: <?php echo $birth_place.", ".$birth_date;; ?> <?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : "2003-01-01"; ?></td>
        </tr>
        <tr>
            <td><b>Gender</b></td>
            <td>: <?php echo $gender; ?></td>
        </tr>
        
        <tr>
            <td><b>Child No</b></td>
            <td>: <?php echo $child_number." of ".$child_total?> siblings</td>
        </tr>
    </tbody>
</table>


<h3><b>Parents Data</b></h3>
<table class="table table-hover">

    <tbody>
        <tr>
            <td><b>Father's Name</b></td>
            <td>: <?php echo $father_name;; ?></td>
        </tr>
        <tr>
            <td><b>Birth Place and Date</b></td>
            <td>: <?php echo $birth_place_father.", ".$birth_date_father; ?></td>
        </tr>
        <tr>
            <td><b>Last Education</b></td>
            <td>: <?php echo $father_last_education;; ?></td>
        </tr>
        
        <tr>
            <td><b>Occupation</b></td>
            <td>: <?php echo $father_job; ?></td>
        </tr>
        
        <tr>
            <td><b>Religion</b></td>
            <td>: <?php echo $father_religion; ?></td>
        </tr>
        <tr>
            <td><b>Mother's Name</b></td>
            <td>: <?php echo $mother_name;; ?></td>
        </tr>
        <tr>
            <td><b>Birth Place and Date</b></td>
            <td>: <?php echo $birth_place_mother.", ".$birth_date_mother; ?></td>
        </tr>
        <tr>
            <td><b>Last Education</b></td>
            <td>: <?php echo $mother_last_education;; ?></td>
        </tr>
        
        <tr>
            <td><b>Occupation</b></td>
            <td>: <?php echo $mother_job; ?></td>
        </tr>
        
        <tr>
            <td><b>Religion</b></td>
            <td>: <?php echo $mother_religion; ?></td>
        </tr>
        <tr>
            <td><b>Phone</b></td>
            <td>: <?php echo $phone; ?></td>
        </tr>
    </tbody>
</table>