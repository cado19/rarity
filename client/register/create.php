<?php
    // THIS SCRIPT WILL HANDLE THE NEW CUSTOMER FORM PROCESSING

    $first_name = $last_name = $email = $id_type = $id_number = $dl_number = $dl_expiry = $tel = $residential_address = $work_address = $date_of_birth = $account_id = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //VALIDATIONS
        if (empty($_POST['first_name'])) {
            $first_name_err = "Required";
            header("Location: index.php?page=client/register/new&first_name_err=$first_name_err");
            exit;
        }
        if (empty($_POST['last_name'])) {
            $last_name_err = "Required";
            header("Location: index.php?page=client/register/new&last_name_err=$last_name_err");
            exit;
        }
        if (empty($_POST['email'])) {
            $email_err = "Required";
            header("Location: index.php?page=client/register/new&email_err=$email_err");
            exit;
        }
        if (empty($_POST['id_type'])) {
            $id_type_err = "Required";
            header("Location: index.php?page=client/register/new&id_type_err=$id_type_err");
            exit;
        }
        if (empty($_FILES['profile_image'])) {
            $profile_image_err = "Required";
            header("Location: index.php?page=client/register/new&profile_image_err=$profile_image_err");
            exit;
        }
        if (empty($_FILES['id_image'])) {
            $id_image_err = "Required";
            header("Location: index.php?page=client/register/new&id_image_err=$id_image_err");
            exit;
        }
        if (empty($_FILES['dl_image'])) {
            $dl_image_err = "Required";
            header("Location: index.php?page=client/register/new&dl_image_err=$dl_image_err");
            exit;
        }

        //PROFILE_IMAGE DETAILS PROCESSING
        $profile_filename = $_FILES["profile_image"]["name"];
        $profile_tempname = $_FILES["profile_image"]["tmp_name"];
        // new file name to eliminate conflicts even if someone uploads the same file twice for different records.
        $profile_filenameNew = "profile_" . date("his") . ".png";

        // folder to upload the image and also its destination
        $profile_folder = "customers/profile/" . $profile_filenameNew;

        //ID_IMAGE DETAILS PROCESSING
        $id_filename = $_FILES["id_image"]["name"];
        $id_tempname = $_FILES["id_image"]["tmp_name"];
        // new file name to eliminate conflicts even if someone uploads the same file twice for different records.
        $id_filenameNew = "id_" . date("his") . ".png";

        // folder to upload the image and also its destination
        $id_folder = "customers/id/" . $id_filenameNew;

        //DL_IMAGE DETAILS PROCESSING
        $dl_filename = $_FILES["dl_image"]["name"];
        $dl_tempname = $_FILES["dl_image"]["tmp_name"];
        // new file name to eliminate conflicts even if someone uploads the same file twice for different records.
        $dl_filenameNew = "license_" . date("his") . ".png";

        // folder to upload the image and also its destination
        $dl_folder = "customers/license/" . $dl_filenameNew;

        if (empty($_POST['date_of_birth'])) {
            $date_of_birth_err = "Required";
            header("Location: index.php?page=client/register/new&date_of_birth_err=$date_of_birth_err");
            exit;
        }

        $first_name          = ucfirst($_POST['first_name']);
        $last_name           = ucfirst($_POST['last_name']);
        $email               = $_POST['email'];
        $id_type             = $_POST['id_type'];
        $id_number           = $_POST['id_number'];
        $dl_number           = $_POST['dl_number'];
        $dl_expiry           = $_POST['dl_expiry'];
        $tel                 = $_POST['tel'];
        $residential_address = $_POST['residential_address'];
        $work_address        = $_POST['work_address'];
        $date_of_birth       = $_POST['date_of_birth'];

        // $details = [$first_name, $last_name, $email, $id_type, $id_number, $dl_number, $dl_expiry, $tel, $residential_address, $work_address, $date_of_birth, $account_id];

        $result = save_client($first_name, $last_name, $email, $id_type, $id_number, $dl_number, $dl_expiry, $tel, $residential_address, $work_address, $date_of_birth, $profile_filenameNew, $id_filenameNew, $dl_filenameNew);

        if ($result == "Success") {
            // UPLOAD THE IMAGES
            move_uploaded_file($profile_tempname, $profile_folder);
            move_uploaded_file($id_tempname, $id_folder);
            move_uploaded_file($dl_tempname, $dl_folder);

            $msg = "Successfully registered";
            header("Location: index.php?page=client/register/success&msg=$msg");
        } else {
            $err_msg = "An error occured";
            header("Location: index.php?page=client/register/new&err_msg=$err_msg");
        }
        // $log->info($result);
    } else {
        $msg = "Unauthorized activity";
        session_start();
        session_destroy();
        header("Location: index.php?err_msg=$msg");
        exit;
    }

?>
<!-- <script>
	console.log(<?php echo json_encode($details); ?>);
</script> -->