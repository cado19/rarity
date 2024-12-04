<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['vehicle_id'];
		// validation

		if (empty($_POST['target'])) {
			$target_err = "Required";
			header("Location: index.php?page=fleet/target_form&id=$id&target_err=$target_err");
		}
		$target = $_POST['target'];


		//save target
		$result = save_target($id, $target);

		if ($result == "Success") {
			$msg = "Successfully updated vehicle target";
			header("Location: index.php?page=fleet/show&id=$id&msg=$msg");
		} else {
			$msg = "An error occured updating vehicle target";
			header("Location: index.php?page=fleet/show&id=$id&err_msg=$msg");
		}
		
	} else {
		// code...
	}
	
 ?>