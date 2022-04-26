<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Print User Schedule</title>
      <?php include 'libs_print.php'; ?>
      
      <style>
            @media print {
                  .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6,
                  .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                       float: left;               
                  }

                  .col-sm-12 {
                       width: 100%;
                  }

                  .col-sm-11 {
                       width: 91.66666666666666%;
                  }

                  .col-sm-10 {
                       width: 83.33333333333334%;
                  }

                  .col-sm-9 {
                        width: 75%;
                  }

                  .col-sm-8 {
                        width: 66.66666666666666%;
                  }

                   .col-sm-7 {
                        width: 58.333333333333336%;
                   }

                   .col-sm-6 {
                        width: 50%;
                   }

                   .col-sm-5 {
                        width: 41.66666666666667%;
                   }

                   .col-sm-4 {
                        width: 33.33333333333333%;
                   }

                   .col-sm-3 {
                        width: 25%;
                   }

                   .col-sm-2 {
                          width: 16.666666666666664%;
                   }

                   .col-sm-1 {
                          width: 8.333333333333332%;
                  }

                  h5{
                        margin-left: 20px;
                  }            
            }
      </style>

</head>
<body>


<script>
      window.print();
</script>

<center><h3><b>COURSE SCHEDULE</b></h3></center>
<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Succeed!</strong> ".$_SESSION['message']."
    </div>";
}
?>

<?php  
include '../../connection.php';

$id              =      $_GET['id'];

$queryClass      =     "SELECT class FROM registration_detail WHERE id_user = $id";
$execQuery       =     mysqli_query($conn, $queryClass);

if ($execQuery) {
      $class =    mysqli_fetch_array($execQuery);
}else{
      echo mysqli_error($conn);
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            
            <div class="card-content">
                  
                  <?php  

                  if ($class == "1") {
                  ?>
                  <div class="row">
                        
                        <div class="col-sm-3">
                              <h5>Monday</h5>
                              <ul>
                              <?php  
                              $queryMonday1     =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='1'";
                              $execMonday1      =     mysqli_query($conn, $queryMonday1);

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
                              $queryWednesday1    =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='1'";
                              $execWednesday1     =     mysqli_query($conn, $queryWednesday1);

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
                              $execThursday1       =     mysqli_query($conn, $queryThursday1));

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
                              $queryMonday2     =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='2'";
                              $execMonday2      =     mysqli_query($conn, $queryMonday2);

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
                              $queryWednesday2    =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='2'";
                              $execWednesday2     =     mysqli_query($conn, $queryWednesday2);

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
                              $execThursday2       =     mysqli_query($conn, $queryThursday2));

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
                              $queryMonday3     =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='3'";
                              $execMonday3      =     mysqli_query($conn, $queryMonday3);

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
                              $queryWednesday3    =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='3'";
                              $execWednesday3     =     mysqli_query($conn, $queryWednesday3);

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
                              $execThursday3       =     mysqli_query($conn, $queryThursday3));

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
                              $queryMonday4     =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='4'";
                              $execMonday4      =     mysqli_query($conn, $queryMonday4);

                              if ($execMonday4) {
                                    while ($monday = mysqli_fetch_array($execMonday4)) {
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
                              $queryWednesday4    =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='4'";
                              $execWednesday4     =     mysqli_query($conn, $queryWednesday4);

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
                              $execThursday4       =     mysqli_query($conn, $queryThursday4));

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
                              $queryMonday5     =     "SELECT * FROM schedule a, subject b WHERE day_id=1 AND a.subject_id=b.subject_code
                                                            AND a.class='5'";
                              $execMonday5      =     mysqli_query($conn, $queryMonday5);

                              if ($execMonday5) {
                                    while ($monday = mysqli_fetch_array($execMonday5)) {
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
                              $queryWednesday5    =     "SELECT * FROM schedule a, subject b WHERE day_id=3 AND a.subject_id=b.subject_code
                                                            AND a.class='5'";
                              $execWednesday5     =     mysqli_query($conn, $queryWednesday5);

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
                              $queryThursday5      =     "SELECT * FROM schedule a, subject b WHERE day_id=4 AND a.subject_id=b.subject_code
                                                            AND a.class='5'";
                              $execThursday5       =     mysqli_query($conn, $queryThursday5));

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
                              $queryFriday5      =     "SELECT * FROM schedule a, subject b WHERE day_id=5 AND a.subject_id=b.subject_code
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
</body>
</html>