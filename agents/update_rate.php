<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $agent_id    = $_POST['agent_id'];
        $category_id = $_POST['category'];

        // SOME VALIDATIONS
        if (empty($_POST['rate'])) {
            $msg = "Required";
            header("Location: index.php?page=agents/edit_rate&id=$agent_id&rate_err=$msg");
            exit;
        }

        $rate = $_POST['rate'];

        $post = [
            'agent_id'    => $agent_id,
            'category_id' => $category_id,
            'rate'        => $rate,
        ];

        $category_name = category_name($category_id);
        $category_name = $category_name['name'];

        //save data into the database
        $response = update_rate($agent_id, $category_id, $rate);
        if ($response == "Success") {
            $msg = "Successfully set rate for $category_name";
            header("Location: index.php?page=agents/show&id=$agent_id&msg=$msg");
            exit;
        } else {
            $msg = "An error occured";
            header("Location: index.php?page=agents/edit_rate&id=$agent_id&err_msg=$msg");
            exit;
        }

    } else {
        $msg = "Unauthorized activity";
        session_start();
        session_destroy();
        header("Location: index.php?err_msg=$msg");
        exit;
    }
?>

<script>
	console.log(<?php echo json_encode($post) ?>);
</script>
