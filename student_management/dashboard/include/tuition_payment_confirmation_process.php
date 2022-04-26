<?php  
session_start();
include '../../connection.php';


if (isset($_GET['id'])) {
	//Installment registration ID
	$id 		=	$_GET['id'];
	//Installment detail ID
	$idd 		=	$_GET['idd'];

	$date 		=	date('Y-m-d');

	$queryUpdateStatusTuition	=	"UPDATE tuition_payment SET tuition_status=1 WHERE id=$id";
	$execUpdateStatusTuition 	=	mysqli_query($conn, $queryUpdateStatusTuition);

	if ($execUpdateStatusTuition) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=25"</script>';
	}else{
		echo mysqli_error($conn);
	}
	
}else{
	echo 'none';
}


?>