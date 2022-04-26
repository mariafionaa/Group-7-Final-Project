<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Registration Requirement</h4>
                <p class="category">Fill in the registration form correctly</p>
            </div>
            <div class="card-content">
                <?php  
                if ($upload_birth_certificate != "" && $upload_family_card != "" && $child_photo != "") {
                        $queryx     =   "SELECT * FROM registration_detail WHERE id_user = $id";
                        $execx      =   mysqli_query($conn, $queryx);
                        if($execx){
                            $regist = mysqli_fetch_array($execx);

                        }else{
                            echo 'failed';
                        }

                        if ($regist['regist_status'] == 1) {
                            echo "<div class='alert alert-success alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Congratulations!</strong> your registration has been confirmed by Admin. next, print the payment receipt <a href='index.php?page=9'><u>in the payment menu</u></a>. and confirm payment after making payment.
                            </div>";

                            // echo '<a href="../assets/uploads/payment_receipt.jpeg" class="btn btn-primary btn-md pull-left" download><i class="fa fa-print"></i> Print the fee to be paid for registration</a>';

                            // echo '<a href="#" class="btn btn-primary btn-md pull-left" download data-toggle="modal" data-target="#myModal"><i class="fa fa-print"></i> Print the fee to be paid for registration</a>';

                            // echo '<br><br>';
                        }else if ($regist['regist_status'] == 2) {
                            echo "<div class='alert alert-warning alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>You have already made the payment</strong> 
                            </div>";
                        }else if($regist['regist_status'] == 0){
                            echo "<div class='alert alert-warning alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Requirements are complete. wait for admin confirmation no later than 2 working days</strong> 
                            </div>";
                        }
                    
                }
                ?>
                


                <h3>The following are the requirements for new student registration that must be met: </h3>
                <ol>
                    <li><font color="#2ecc71">Fill out the Registration Form <i class="fa fa-check"></font></i></li>
                    <li> 
                        <?php 

                            if ($upload_birth_certificate != "" && $upload_family_card != "") {

                                if ($regist['regist_status'] == 1) {
                                    echo '<font color="#2ecc71">Photocopy of birth certificate and family card 2 sheets<i class="fa fa-check"></i></font>';
                                }else if($regist['regist_status'] >= 2){
                                    echo '<font color="#2ecc71">Photocopy of birth certificate and family card 2 sheets<i class="fa fa-check"></i></font>';
                                }else{
                                  echo '<font color="#2ecc71">Photocopy of birth certificate and family card 2 sheets<i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Birth Certificate and Family Card"><i class="fa fa-pencil"></i></a>';
                                }

                                
                            }else{
                                echo 'Photocopy of birth certificate and family card <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Birth Certificate and Family Card"><i class="fa fa-upload"></i></a>';
                            }
                        
                        ?>
                    </li>
                    <li>
                        <?php 

                            if ($child_photo != "") {

                                if ($regist['regist_status'] == 1) {
                                    echo '<font color="#2ecc71">Photos of child photo size 2R<i class="fa fa-check"></i></font>';
                                }else if($regist['regist_status'] >= 2){
                                    echo '<font color="#2ecc71">Photos of child photo size 2R<i class="fa fa-check"></i></font>';
                                }else{
                                    echo '<font color="#2ecc71">Photos of child photo size 2R<i class="fa fa-check"></i></font> <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Upload Child Photo (Size 2R)"><i class="fa fa-pencil"></i></a>';
                                }
                                
                            }else{
                                echo 'Photos of child photo size 2R <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Student Photo (Size 2R)"><i class="fa fa-upload"></i></a>';
                            }
                        
                        ?>
                    </li>
                </ol>

                <h6><i><b>*Note: Wait for admin confirmation no later than two working days for file verification.</b></i></h6>
            </div>
        </div>
    </div>
</div>


<!-- MODAL -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose Payment Method</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="">Payment Method</label>
              <select name="payment_method" class="form-group">
                  <option value="" disabled selected>-- Choose Payment Method --</option>
                  <option value="0">Paid off</option>
                  <option value="1">Installment (6x)</option>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check"></i>Choose</button>
        </div>
      </div>
      
    </div>
</div>