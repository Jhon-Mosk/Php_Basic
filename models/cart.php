<?php

function getCart($session_id)
{
    return getAssocResult("SELECT * FROM `cart`, `product` WHERE cart.product_id = product.id AND `session_id` = '{$session_id}'");
}

function addToCart($product_id, $session_id, $login)
{
    $hash = uniqid(rand(), true);
    $price = getOneResult("SELECT `actualPrice` FROM `product` WHERE `id` = '{$product_id}'")['actualPrice'];

    executeSql("INSERT INTO `cart`(`product_id`, `session_id`, `login`, `price`, `uniqId`) VALUES ('{$product_id}','{$session_id}','{$login}', '{$price}', '{$hash}')");
}

function delFromCart($product_id, $session_id, $uniqId)
{
    executeSql("DELETE FROM `cart` WHERE `product_id` = {$product_id} AND `session_id` = '{$session_id}' AND `uniqId` = '{$uniqId}'");
}

function checkoutCart($login, $phone, $session_id)
{
    $now = date("Y-m-d H:i:s");
    executeSql("INSERT INTO `checkout`(`login`, `phone`, `session_id`, `date`, `status`) VALUES ('{$login}','{$phone}','{$session_id}', '{$now}', 'await')");
}

function getCartCount($session_id)
{
    return getOneResult("SELECT count(id) as count FROM `cart` WHERE `session_id` = '{$session_id}'")['count'];
}

function getSumCart($session_id)
{
    return getOneResult("SELECT SUM(`price`) as total FROM `cart` WHERE `session_id` = '{$session_id}'")['total'] ?? 0;
}

function doCartAction($action, $params)
{

    switch ($action) {
        case 'buy':
            addToCart($params['product_id'], $params['session_id'], $params['user_login']);

            header("Location: /surfhouse");
            die();

        case 'del':
            $uniqId = securityInput(getDb(), $params['uniq_id']);

            delFromCart($params['product_id'], $params['session_id'], $uniqId);

            header("Location: /cart");
            die();
    }

    if (isset($_POST['checkout'])) {
        $phone = securityInput(getDb(), $_POST['phone']);
        checkoutCart($params['user_login'], $phone, $params['session_id']);
        session_regenerate_id();
        header("Location: /cart/?message=checkoutOk");
        die();
    }

    return $params;
}
