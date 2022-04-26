<?php
session_start();
include '../../connection.php';


if (isset($_GET['id'])) {
	//Installment registration ID
	$id 		=	$_GET['id'];
	//Installment detail ID
	$idd 		=	$_GET['idd'];

	$date 		=	substr(date('Y'), 2,4);

	//Query to get student's last student id
	$query="select * from student order by student_id desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['student_id'];
        $baru=substr($kode,2,6);
          //$nilai=$baru+1;
          $nol=(int)$baru;
      } 
      else{
        $nol=0;
        }
      $nol=$nol+1;
      $nol2="";
      $nilai=4-strlen($nol);
      for ($i=1;$i<=$nilai;$i++){
        $nol2= $nol2."0";
        }

        $kode2 =$date.$nol2.$nol;
        
    }
    else{
    echo mysqli_error();
    }


	//QUery ubah status cicilan menjadi 1(sudah dikonfirmasi oleh admin)
	$query		=	"UPDATE registration_installment 
					SET installment_status=1
					WHERE id=$id";
	$exec 		= 	mysqli_query($conn, $query);


	//Query mendapatkan metode pembayaran dan kelas yang didapat oleh siswa
	$queryPaymentMethod		=	"SELECT registration_payment_method, class FROM registration_detail WHERE id=$idd";
	$execGetPaymentMethod 	=	mysqli_query($conn, $queryPaymentMethod);

	//Cek apakah eksekusi program berhasil
	if ($execGetPaymentMethod) {
		//menampung hasil query kedalam array $payment
		$payment	=	mysqli_fetch_array($execGetPaymentMethod);
	}

	$queryGetName	=	"SELECT name FROM registration a, registration_detail b WHERE b.user_id = a.id AND b.id = $idd";
	$exacGetName	=	mysqli_query($conn, $queryGetName);
	if ($exacGetName) {
		$user 		=	mysqli_fetch_array($exacGetName);
		$name 		=	$user['name'];
	}

	//simpan hasil query mendapatkan metode pembayaran dan kelas kedalam variable
	$payment_method 	=	$payment['registration_payment_method'];
	$class 				= 	$payment['class'];

	//Cek apakah metode pembayaran Lunas (L) Atau Cicilan (C)
	if ($payment_method == "L") {
		//Update status pendaftaran menjadi 4 (LUNAS)
		$queryRegistrationDetail	=	"UPDATE registration_detail SET registration_status=4 WHERE id=$idd";
		$execRegistrationStatus	=	mysqli_query($conn, $queryRegistrationDetail);

		//Query untuk insert data ke dalam table siswa setelah melakukan pembayaran pertama
		$queryStudentId	=	"INSERT INTO student VALUES('$kode2','$class' , $idd,'$name')";
		$exacStudentId 	=	mysqli_query($conn, $queryStudentId);


		if (!$exacStudentId) {
			echo mysqli_error($conn);
		}
	}else{
		//Query mendapatkan jumlah cicilan pembayaran pendaftaran oleh user
		$queryInstallmentCount		=	"SELECT SUM(nominal) as nom FROM registration_installment WHERE registration_id_detail=$idd";
		$execInstallmentCount		=	mysqli_query($conn, $queryInstallmentCount);

		//Cek apakah query berhasil
		if ($execInstallmentCount) {
			//tampung hasil kedalam array $row
			$row			=	mysqli_fetch_array($execInstallmentCount);
			$countNominal	=	$row['nom'];	
		}

		$queryTotalRowInstallment	=	"SELECT * FROM registration_installment WHERE registration_detail_id=$idd";
		$execTotalRowInstallment	=	mysqli_query($conn,$queryTotalRowInstallment);

		if ($execTotalRowInstallment) {
			$totalRowInstallment 	=	mysqli_num_rows($execTotalRowInstallment);
		}else{
			echo mysqli_error($conn);
		}


		//Cek apakah kelas A atau B
		if ($kelas == "A") {
			//Cek apakah jumlah cicilan sudah melebihi 880000 atau tidak, jika iya, maka ubah status jadi 4, jika tidak maka ubah 
			//status jadi 3
			if ($countNominal >= 880000) {
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=4 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}else{
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=3 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}

			echo $totalRowCicilan;

			if ($totalRowCicilan <= 1) {
				//Query untuk insert data ke dalam table siswa setelah melakukan pembayaran pertama
				$queryNis	=	"INSERT INTO siswa VALUES('$kode2','$kelas' , $idd,'$nama')";
				$exacNis 	=	mysqli_query($conn, $queryNis);
				if (!$exacNis) {
					echo mysqli_error($conn);
				}
			}
		}else{
			//Cek apakah jumlah cicilan sudah melebihi 895000 atau tidak, jika iya, maka ubah status jadi 4, jika tidak maka ubah 
			//status jadi 3
			if ($countNominal >= 895000) {
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=4 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}else{
				$queryDetailPendaftaran	=	"UPDATE detail_pendaftaran SET status_pendaftaran=3 WHERE Id=$idd";
				$execStatusPendaftaran	=	mysqli_query($conn, $queryDetailPendaftaran);
			}

			echo 'kelas B';

			if ($totalRowCicilan <= 1) {
				//Query untuk insert data ke dalam table siswa setelah melakukan pembayaran pertama
				$queryNis	=	"INSERT INTO siswa VALUES('$kode2','$kelas' , $idd,'$nama')";
				$exacNis 	=	mysqli_query($conn, $queryNis);
				if (!$exacNis) {
					echo mysqli_error($conn);
				}
			}
		}

		
	}

	if ($exec) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=17"</script>';
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'none';
}


?>