<?php

function getFeedback($id_product)
{
    return getAssocResult("SELECT * FROM `feedback` WHERE `id_product` = '$id_product' ORDER BY `id` DESC");
}

function getOneFeedback($id)
{
    return getOneResult("SELECT * FROM `feedback` WHERE `id` = '$id'");
}

function insertFeedback($name, $feedback, $id_product)
{
    return executeSql("INSERT INTO `feedback`(`name`, `feedback`, `id_product`) VALUES ('$name','$feedback','$id_product')");
}

function editFeedback($id, $name, $feedback)
{
    return executeSql("UPDATE `feedback` SET `name`='$name',`feedback`='$feedback' WHERE `id`='$id'");
}

function deleteFeedback($id)
{
    return executeSql("DELETE FROM `feedback` WHERE `id` = '$id'");
}

function securityInput($db, $value)
{
    return strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $value)));
}

function doFeedbackAction($action, $params)
{
    switch ($action) {
        case 'delete':
            deleteFeedback((int) $_GET['feedbackId']);

            header("Location: /oneProduct/?id={$_GET['id']}&message=delete");
            die();

        case 'edit':
            $params['editFeedback'] = getOneFeedback((int) $_GET['feedbackId']);
            $params['textButton'] = 'Изменить';
            $params['action'] = 'save';
            $params['feedbackId'] = (int) $_GET['feedbackId'];
            break;
            // default:
            //     // header("Location: ?id={$_GET['id']}");
            //     die();
    }

    if (!empty($_POST)) {
        switch ($_POST['action']) {
            case 'add':
                $product_id = securityInput(getDb(), $_POST['productId']);
                $name = securityInput(getDb(), $_POST['name']);
                $feedback = securityInput(getDb(), $_POST['feedback']);

                insertFeedback($name, $feedback, $product_id);
                header("Location: /oneProduct/?id=$product_id&message=add");
                die();

            case 'save':
                $product_id = securityInput(getDb(), $_POST['productId']);
                $name = securityInput(getDb(), $_POST['name']);
                $feedback = securityInput(getDb(), $_POST['feedback']);
                $feedbackId = securityInput(getDb(), $_POST['feedbackId']);

                editFeedback($feedbackId, $name, $feedback);

                header("Location: /oneProduct/?id=$product_id&message=edit");
                die();
        }
    }

    return $params;
}
