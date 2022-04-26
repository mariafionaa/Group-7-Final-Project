<h2>Payment Confirmation</h2>

<?php  

$queryx     =   "SELECT * FROM registartion_detail WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $regist = mysqli_fetch_array($execx);

}else{
    echo 'failed';
}	

$idetail 	=	$regist['id'];

$queryInstallment	=	"SELECT SUM(nominal) as  nom FROM registration_installment WHERE regist_detail_id=$idetail";
$execInstallment	=	mysqli_query($conn, $queryInstallment);

if ($execInstallment) {
	$nominal	=	mysqli_fetch_array($execInstallment);
}else{
	echo mysqli_error($conn);
}


$nom	=	$nominal['nom'];


$queryLastInstallment   =   "SELECT installment_status FROM registration_installment WHERE regist_detail_id=$idetail ORDER BY  id DESC LIMIT 1";
$execLastInstallment    =   mysqli_query($conn, $queryLastInstallment);

if ($execLastInstallment) {
    $row    =   mysqli_fetch_array($execLastInstallment);
    $lastStatus =   $row['installment_status'];
}


$class              =   $regist['class'];
$payment_method     =   $regist['regist_payment_method'];

?>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Payment Confirmation</h4>
                <p class="category">Payment confirmation list</p>
            </div>
            <div class="card-content">
            	
            	<ul>
            		
            		<?php  
        			if ($regist['regist_status'] == 1) {
        			?>
					<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Registration Payment Confirmation</a></li>
				
        			<?php
        			}elseif ($regist['regist_status'] == 2) {

                        if ($nom >= 47000000) {
                            if ($lastStatus == 0) {
                                echo '<li><a href="" class="btn btn-warning btn-lg">Registration payment confirmation</a>(Wait for admin confirmation)</li> ';
                            }else{
                                echo '<li><a href="" class="btn btn-warning btn-lg">Registration payment confirmation (Paid)</a><i class="fa fa-check"></i></li> ';
                            }
                        }else{
                            if ($laststatus == 0) {
                            }else{
                                echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Registration payment confirmation</a></li>';
                            }
                            
        			?>
        			
        			<?php	
        			}else if($regist['regist_status'] == 3){
        			     
                        if ($nom >= 47000000) {
                            if ($lastStatus == 0) {
                                echo '<li><a href="" class="btn btn-warning btn-lg">Registration payment confirmation</a> (Wait for admin confirmation)</li> ';
                            }else{
                                echo '<li><a href="" class="btn btn-warning btn-lg">Registration payment confirmation (Paid)</a><i class="fa fa-check"></i></li> ';
                            }
                        }else{
                            if ($nom < 47000000) {
                                echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Confirmation of registration repayment</a></li>';   
                            }else{
                                echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Registration payment confirmation</a></li>';
                            }
                        }
                    }
                    ?>
                      
                    <?php  

                    $queryTuition   =   "SELECT COUNT(installment_no) as countTuition FROM tuition_payment WHERE id_user=$id AND tuition_status=1";
                    $exacTuition    =   mysqli_query($conn, $queryTuition);

                    if ($exacTuition) {
                        $countTuition   =   mysqli_fetch_array($exacTuition);
                        $countTuition   =   $countTuition['countTuition'];
                        

                        if ($countTuition >= 6) {
                            echo '<li><a href="#" class="btn btn-warning btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment (ALREADY PAID)</a><i class="fa fa-check"></i></li>';
                        }else{
                            $queryStatus    =   "SELECT * FROM tuition_payment WHERE id_user=$id AND tuition_status=0";
                            $exacStatus     =   mysqli_query($conn, $queryStatus);

                            if ($exacStatus) {
                                $null   =    mysqli_num_rows($exacStatus);

                                if ($null > 0) {
                                    echo '<li><a href="#" class="btn btn-warning btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment</a> (Wait for admin confirmation)</li>';
                                }else{
                                    echo '<li><a href="index.php?page=16" class="btn btn-primary btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment</a> ('.$countTuition.' month payment)</li>';
                                }
                            }else echo 'none';
                        }

                    }else {
                        echo '<li><a href="index.php?page=16" class="btn btn-primary btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment</a></li>';
                    }
                    ?>   


        			
                    <?php
        			}else if($regist['regist_status'] == 4){

                        if ($nom >= 47000000) {
                            echo '<li><a href="" class="btn btn-warning btn-lg">Confirmation of registration payment (Paid)</a><i class="fa fa-check"></i></li> ';
                        }else{
                            echo '<li><a href="index.php?page=15" class="btn btn-primary btn-lg">Confirmation of registration payment</a></li>';
                        }
                    ?>


                    <?php  

                    $queryTuition   =   "SELECT COUNT(installment_no) as countTuition FROM tuition_payment WHERE id_user=$id AND tuition_status=1";
                    $exacTuition    =   mysqli_query($conn, $queryTuition);

                    if ($exacTuition) {
                        $countTuition   =   mysqli_fetch_array($exacTuition);
                        $countTuition   =   $countTuition['countTuition'];
                        
                        if ($countTuition >= 6) {
                            echo '<li><a href="#" class="btn btn-warning btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment (ALREADY PAID)</a><i class="fa fa-check"></i></li>';
                        }else{
                            
                            $queryStatus    =   "SELECT * FROM tuition_payment WHERE id_user=$id AND tuition_status=0";
                            $exacStatus     =   mysqli_query($conn, $queryStatus);

                            if ($exacStatus) {
                                $null   =    mysqli_num_rows($exacStatus);

                                if ($null > 0) {
                                    echo '<li><a href="#" class="btn btn-warning btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment</a> (Wait for admin confirmation)</li>';
                                }else{
                                    echo '<li><a href="index.php?page=16" class="btn btn-primary btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment</a> ('.$countTuition.' month payment)</li>';
                                }
                            }else echo 'none';

                        }

                    }else {
                        echo '<li><a href="index.php?page=16" class="btn btn-primary btn-lg" title="Make a registration payment in advance">Confirmation of tuition payment</a></li>';
                    }
                    ?> 

                    <?php
                    }else{
                    ?>

                    <h3>You have not completed registration or have not been confirmed by the admin, click  <a href="index.php?page=4">here</a> to complete or view list status</h3>
                    
                    <?php
                    }
            		?>
            		
            	</ul>
            
            </div>
        </div>
    </div>
</div>