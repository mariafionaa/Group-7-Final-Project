<?php
	//Start session  
	session_start();
	
	//import connection to database
	include "connection.php";

	//check if $_SESSION is exist
	if (isset($_SESSION)) {
		foreach ($_SESSION as $key => $val) {
			${$key} = $val;
		}


		$sql	= "INSERT INTO registration VALUES(null,'$full_name', '$nick_name', '$birth_place'
					, '$birth_date' ,'$gender', '$child_number', '$child_total', '$father_name'
					, '$birth_place_father','$birth_date_father', '$father_last_education'
					, '$father_job', '$father_religion','$mother_name', '$birth_place_mother', '$birth_date_mother'
					, '$mother_last_education', '$mother_job', '$mother_religion', '$phone','','','','')";

		$exec 	= mysqli_query($conn,$sql);

		if ($exec) {

			$id 		= $conn->insert_id;
			//echo $id;
			$query 		= "INSERT INTO account VALUES(null, '$email', '$password', '',1, $id)";

			$exec_account 	=  mysqli_query($conn, $query);

			$date_regist	= date("Y-m-d");

			$query2		= "INSERT INTO registration_detail (id_user, regist_date, regist_status)
							VALUES($id, '$date_regis', 0)";

			$exec_detail	= mysqli_query($conn, $query2);

			if ($exec_account && $exec_detail) {
				session_destroy();
				echo'<script> window.location="success_register.php"; </script> ';
			}else{
				echo mysqli_error($conn);
				echo 'failed';
			}

		}else{
			echo mysqli_error($conn);
		}
	}
?>