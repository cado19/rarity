<?php
    $cost = '';
    $date = date('Y-m-d');
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['cost'])) {
            $cost = $_POST['cost'];
        }
        $issue_id = $_POST['issue_id'];
        $result = resolve_issue($issue_id, $cost, $date);
        if ($result == "Success") {
            $msg = "Successfully resolved the issue";
            header("Location: index.php?page=fleet/issue&id=$issue_id&msg=$msg");
            exit;
        } else {
            $err_msg = "Successfully resolved the issue";
            header("Location: index.php?page=fleet/issue&id=$issue_id&err_msg=$err_msg");
            exit;
        }
        
    }else{
        $msg = "Unauthorized activity";
        session_start();
        session_destroy();
        header("Location: index.php?msg=$msg");
        exit;
    }
?>