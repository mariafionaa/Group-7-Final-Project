<style>
	h5{
		margin-left: 30px;
	}
</style>

<h1>Schedule</h1>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Succeed!</strong> ".$_SESSION['message']."
    </div>";
}
?>

<?php  


$queryClass      =     "SELECT class FROM registration_detail WHERE user_id= $id";
$execQuery       =     mysqli_query($conn, $queryClass);

if ($execQuery) {
      $queryClass =    mysqli_fetch_array($execQuery);
}else{
      echo mysqli_error($conn);
}

?>

<a href="include/print_user_schedule.php?id=<?php echo $id ?>" class="btn btn-warning btn-md pull-right"><i class="fa fa-print"></i> Print Schedule</a>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Class Schedule<?php echo $class['class']; ?></h4>
                <p class="category">List of Class Subjects <?php echo $class['class']; ?></p>


            </div>
            <div class="card-content">
                  
                  <?php  

                  if ($class == "1") {
                  ?>
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Monday</h5>
                              <ul>
                              <?php  
                              $querySMonday1      =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='1'";
                              $execMonday1       =     mysqli_query($conn, $queryMonday1);

                              if ($execMonday1) {
                                    while ($monday = mysqli_fetch_array($execMonday1)) {
                              ?>
                                          <li><?php echo $monday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>



                        
                        <div class="col-sm-3">
                              <h5>Tuesday</h5>
                              <ul>
                              <?php  
                              $queryTuesday1      =     "SELECT * FROM schedule a, subject b WHERE day_id=2 AND a.subject_id=b.subject_code
                                                            AND a.class='1'";
                              $execTuesday1       =     mysqli_query($conn, $queryTuesday1);

                              if ($execTuesday1) {
                                    while ($tuesday = mysqli_fetch_array($execTuesday1)) {
                              ?>
                                          <li><?php echo $tuesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Wednesday</h5>
                              <ul>
                              <?php  
                              $queryWednesday1      =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='1'";
                              $execWednesday1       =     mysqli_query($conn, $queryWednesday1);

                              if ($execWednesday1) {
                                    while ($wednesday = mysqli_fetch_array($execWednesday1)) {
                              ?>
                                          <li><?php echo $wednesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Thursday</h5>
                              <ul>
                              <?php  
                              $queryThursday1      =     "SELECT * FROM schedule a, subject b WHERE day_id=4 AND a.subject_id=b.subject_code
                                                            AND a.class='1'";
                              $execThursday1      =     mysqli_query($conn, $queryThursday1);

                              if ($execThursday1) {
                                    while ($thursday = mysqli_fetch_array($execThursday1)) {
                              ?>
                                          <li><?php echo $thursday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>
                  
                        
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Friday</h5>
                              <ul>
                              <?php  
                              $queryFriday1      =     "SELECT * FROM schedule a, subject b WHERE day_id=5 AND a.subject_id=b.subject_code
                                                            AND a.class='1'";
                              $execFriday1       =     mysqli_query($conn, $queryFriday1);

                              if ($execFriday1) {
                                    while ($friday = mysqli_fetch_array($execFriday1)) {
                              ?>
                                          <li><?php echo $friday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>

                        
                       
                  </div>


                  
            </div>  
                  <?php
                  }else{
                  ?>
            <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Monday</h5>
                              <ul>
                              <?php  
                              $querySMonday2      =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='2'";
                              $execMonday2       =     mysqli_query($conn, $queryMonday2);

                              if ($execMonday2) {
                                    while ($monday = mysqli_fetch_array($execMonday2)) {
                              ?>
                                          <li><?php echo $monday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>



                        
                        <div class="col-sm-3">
                              <h5>Tuesday</h5>
                              <ul>
                              <?php  
                              $queryTuesday2      =     "SELECT * FROM schedule a, subject b WHERE day_id=2 AND a.subject_id=b.subject_code
                                                            AND a.class='2'";
                              $execTuesday2       =     mysqli_query($conn, $queryTuesday2);

                              if ($execTuesday2) {
                                    while ($tuesday = mysqli_fetch_array($execTuesday2)) {
                              ?>
                                          <li><?php echo $tuesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Wednesday</h5>
                              <ul>
                              <?php  
                              $queryWednesday2      =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='2'";
                              $execWednesday2       =     mysqli_query($conn, $queryWednesday1);

                              if ($execWednesday2) {
                                    while ($wednesday = mysqli_fetch_array($execWednesday2)) {
                              ?>
                                          <li><?php echo $wednesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Thursday</h5>
                              <ul>
                              <?php  
                              $queryThursday2      =     "SELECT * FROM schedule a, subject b WHERE day_id=4 AND a.subject_id=b.subject_code
                                                            AND a.class='2'";
                              $execThursday2      =     mysqli_query($conn, $queryThursday2);

                              if ($execThursday2) {
                                    while ($thursday = mysqli_fetch_array($execThursday2)) {
                              ?>
                                          <li><?php echo $thursday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>
                  
                        
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Friday</h5>
                              <ul>
                              <?php  
                              $queryFriday2      =     "SELECT * FROM schedule a, subject b WHERE day_id=5 AND a.subject_id=b.subject_code
                                                            AND a.class='2'";
                              $execFriday2       =     mysqli_query($conn, $queryFriday2);

                              if ($execFriday2) {
                                    while ($friday = mysqli_fetch_array($execFriday2)) {
                              ?>
                                          <li><?php echo $friday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>

                        
                       
                  </div>


                  
            </div>  
                  <?php
                  }else{
                  ?>
                   <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Monday</h5>
                              <ul>
                              <?php  
                              $querySMonday3      =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='3'";
                              $execMonday3       =     mysqli_query($conn, $queryMonday3);

                              if ($execMonday3) {
                                    while ($monday = mysqli_fetch_array($execMonday3)) {
                              ?>
                                          <li><?php echo $monday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>



                        
                        <div class="col-sm-3">
                              <h5>Tuesday</h5>
                              <ul>
                              <?php  
                              $queryTuesday3      =     "SELECT * FROM schedule a, subject b WHERE day_id=2 AND a.subject_id=b.subject_code
                                                            AND a.class='3'";
                              $execTuesday3       =     mysqli_query($conn, $queryTuesday3);

                              if ($execTuesday3) {
                                    while ($tuesday = mysqli_fetch_array($execTuesday3)) {
                              ?>
                                          <li><?php echo $tuesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Wednesday</h5>
                              <ul>
                              <?php  
                              $queryWednesday3      =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='3'";
                              $execWednesday3       =     mysqli_query($conn, $queryWednesday1);

                              if ($execWednesday3) {
                                    while ($wednesday = mysqli_fetch_array($execWednesday3)) {
                              ?>
                                          <li><?php echo $wednesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Thursday</h5>
                              <ul>
                              <?php  
                              $queryThursday3      =     "SELECT * FROM schedule a, subject b WHERE day_id=4 AND a.subject_id=b.subject_code
                                                            AND a.class='3'";
                              $execThursday3      =     mysqli_query($conn, $queryThursday2);

                              if ($execThursday3) {
                                    while ($thursday = mysqli_fetch_array($execThursday3)) {
                              ?>
                                          <li><?php echo $thursday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>
                  
                        
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Friday</h5>
                              <ul>
                              <?php  
                              $queryFriday3      =     "SELECT * FROM schedule a, subject b WHERE day_id=5 AND a.subject_id=b.subject_code
                                                            AND a.class='3'";
                              $execFriday3       =     mysqli_query($conn, $queryFriday3);

                              if ($execFriday3) {
                                    while ($friday = mysqli_fetch_array($execFriday3)) {
                              ?>
                                          <li><?php echo $friday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>

                        
                       
                  </div>


                  
            </div>  
                  <?php
                  }else{
                  ?>
                   <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Monday</h5>
                              <ul>
                              <?php  
                              $querySMonday4      =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='4'";
                              $execMonday4       =     mysqli_query($conn, $queryMonday4);

                              if ($execMonday4) {
                                    while ($Monday = mysqli_fetch_array($execMonday4)) {
                              ?>
                                          <li><?php echo $monday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>



                        
                        <div class="col-sm-3">
                              <h5>Tuesday</h5>
                              <ul>
                              <?php  
                              $queryTuesday4      =     "SELECT * FROM schedule a, subject b WHERE day_id=2 AND a.subject_id=b.subject_code
                                                            AND a.class='4'";
                              $execTuesday4       =     mysqli_query($conn, $queryTuesday4);

                              if ($execTuesday4) {
                                    while ($tuesday = mysqli_fetch_array($execTuesday4)) {
                              ?>
                                          <li><?php echo $tuesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Wednesday</h5>
                              <ul>
                              <?php  
                              $queryWednesday4      =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='4'";
                              $execWednesday4       =     mysqli_query($conn, $queryWednesday1);

                              if ($execWednesday4) {
                                    while ($wednesday = mysqli_fetch_array($execWednesday4)) {
                              ?>
                                          <li><?php echo $wednesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Thursday</h5>
                              <ul>
                              <?php  
                              $queryThursday4      =     "SELECT * FROM schedule a, subject b WHERE day_id=4 AND a.subject_id=b.subject_code
                                                            AND a.class='4'";
                              $execThursday4      =     mysqli_query($conn, $queryThursday4);

                              if ($execThursday4) {
                                    while ($thursday = mysqli_fetch_array($execThursday4)) {
                              ?>
                                          <li><?php echo $thursday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>
                  
                        
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Friday</h5>
                              <ul>
                              <?php  
                              $queryFriday4      =     "SELECT * FROM schedule a, subject b WHERE day_id=5 AND a.subject_id=b.subject_code
                                                            AND a.class='4'";
                              $execFriday4       =     mysqli_query($conn, $queryFriday4);

                              if ($execFriday4) {
                                    while ($friday = mysqli_fetch_array($execFriday4)) {
                              ?>
                                          <li><?php echo $friday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>

                        
                       
                  </div>


                  
            </div>  
                  <?php
                  }else{
                  ?>
                   <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Monday</h5>
                              <ul>
                              <?php  
                              $querySMonday5      =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='5'";
                              $execMonday5       =     mysqli_query($conn, $queryMonday5);

                              if ($execMonday5) {
                                    while ($Monday = mysqli_fetch_array($execMonday5)) {
                              ?>
                                          <li><?php echo $monday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>



                        
                        <div class="col-sm-3">
                              <h5>Tuesday</h5>
                              <ul>
                              <?php  
                              $queryTuesday5      =     "SELECT * FROM schedule a, subject b WHERE day_id=2 AND a.subject_id=b.subject_code
                                                            AND a.class='5'";
                              $execTuesday5       =     mysqli_query($conn, $queryTuesday5);

                              if ($execTuesday5) {
                                    while ($tuesday = mysqli_fetch_array($execTuesday5)) {
                              ?>
                                          <li><?php echo $tuesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Wednesday</h5>
                              <ul>
                              <?php  
                              $queryWednesday5      =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='5'";
                              $execWednesday5       =     mysqli_query($conn, $queryWednesday5);

                              if ($execWednesday5) {
                                    while ($wednesday = mysqli_fetch_array($execWednesday5)) {
                              ?>
                                          <li><?php echo $wednesday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>


                        <div class="col-sm-3">
                              <h5>Thursday</h5>
                              <ul>
                              <?php  
                              $queryThursday5      =     "SELECT * FROM schedule a, subject b WHERE day_id=4 AND a.subject_code=b.subject_code
                                                            AND a.class='5'";
                              $execThursday5      =     mysqli_query($conn, $queryThursday5);

                              if ($execThursday5) {
                                    while ($thursday = mysqli_fetch_array($execThursday5)) {
                              ?>
                                          <li><?php echo $thursday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>
                  </div>
                  
                        
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Friday</h5>
                              <ul>
                              <?php  
                              $queryFriday5      =     "SELECT * FROM schedule a, subject b WHERE day_id=5 AND a.subject_code=b.subject_code
                                                            AND a.class='5'";
                              $execFriday5       =     mysqli_query($conn, $queryFriday5);

                              if ($execFriday5) {
                                    while ($friday = mysqli_fetch_array($execFriday5)) {
                              ?>
                                          <li><?php echo $friday['subject_name']; ?></li>
                              <?php
                                    }
                              }
                              ?>
                              </ul>
                        </div>

                        
                       
                  </div>


                  
            </div>  
                  <?php
                  }
                  ?>

            	
        </div>
    </div>
</div>



</div>

<?php  

unset($_SESSION['message']);

?>