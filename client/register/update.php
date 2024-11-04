<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // DECLARE CLIENT ID. NECESSARY TO BE DONE HERE BECAUSE OF REDIRECT IN THE EVENT OF ERROR

        $id = $_POST['id'];
        //VALIDATIONS

        if (empty($_POST['date_of_birth'])) {
            $date_of_birth_err = "Required";
            header("Location: index.php?page=client/register/new&date_of_birth_err=$date_of_birth_err");
            exit;
        }

        if (empty($_POST['id_type'])) {
            $id_type_err = "Required";
            header("Location: index.php?page=client/register/new&id_type_err=$id_type_err");
            exit;
        }

        if (empty($_POST['id_number'])) {
            $id_number_err = "Required";
            header("Location: index.php?page=client/register/new&id_number_err=$id_number_err&id=$id");
            exit;
        }

        if (empty($_POST['dl_number'])) {
            $dl_number_err = "Required";
            header("Location: index.php?page=client/register/new&dl_number_err=$dl_number_err&id=$id");
            exit;
        }

        if (empty($_POST['dl_expiry'])) {
            $dl_expiry_err = "Required";
            header("Location: index.php?page=client/register/new&dl_expiry_err=$dl_expiry_err&id=$id");
            exit;
        }

        if (empty($_POST['tel'])) {
            $tel_err = "Required";
            header("Location: index.php?page=client/register/new&id_type_err=$tel_err&id=$id");
            exit;
        }

        if (empty($_POST['residential_address'])) {
            $residential_address_err = "Required";
            header("Location: index.php?page=client/register/new&residential_address_err=$residential_address_err&id=$id");
            exit;
        }

        if (empty($_POST['work_address'])) {
            $work_address_err = "Required";
            header("Location: index.php?page=client/register/new&work_address_err=$work_address_err&id=$id");
            exit;
        }

        // ASSIGN POST DATA TO VARIABLES
        $id_type             = $_POST['id_type'];
        $id_number           = $_POST['id_number'];
        $dl_number           = $_POST['dl_number'];
        $dl_expiry           = $_POST['dl_expiry'];
        $tel                 = $_POST['tel'];
        $residential_address = $_POST['residential_address'];
        $work_address        = $_POST['work_address'];
        $date_of_birth       = $_POST['date_of_birth'];

        $result = update_client($id_type, $id_number, $tel, $residential_address, $work_address, $date_of_birth, $dl_number, $dl_expiry, $id);
        $posts  = [$id_type, $id_number, $tel, $residential_address, $work_address, $date_of_birth, $dl_number, $dl_expiry, $id];

        if ($result == "Success") {
            $msg = "Successfully registered";
            header("Location: index.php?page=client/register/success&msg=$msg");
        } else {
            $err_msg = "An error occured";
            header("Location: index.php?page=client/register/edit&err_msg=$err_msg&id=$id");
        }

    } else {
        $msg = "Unauthorized activity";
        session_start();
        session_destroy();
        header("Location: index.php?err_msg=$msg");
        exit;
}
