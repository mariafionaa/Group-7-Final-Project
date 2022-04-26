<?php  

session_start();
include '../../connection.php';

if (isset($_GET['id'])) {
	
	$id 		= 	$_GET['id'];

	$query		= 	"DELETE FROM subject WHERE subject_code = '$id'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Delete data lecturer";
		echo '<script>window.location="../index.php?page=19"</script>';
	}
}
?>