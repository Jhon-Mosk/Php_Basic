<?php

function getAllOrders()
{
    $orders = getAssocResult("SELECT * FROM `checkout`, `cart`, `product` WHERE checkout.session_id = cart.session_id AND cart.product_id = product.id ORDER BY `date` DESC");

    return sortOrdersBy('session_id', $orders);
}

function getOrdersByStatus($status)
{
    $orders = getAssocResult("SELECT * FROM `checkout`, `cart`, `product` WHERE `status` = '{$status}' AND checkout.session_id = cart.session_id AND cart.product_id = product.id ORDER BY `date` DESC");

    return sortOrdersBy('session_id', $orders);
}

function getUserOrders($login)
{
    $orders = getAssocResult("SELECT * FROM `checkout`, `cart`, `product` WHERE checkout.session_id = cart.session_id AND cart.product_id = product.id AND checkout.login = '{$login}' ORDER BY `date` DESC");

    return sortOrdersBy('session_id', $orders);
}

function sortOrdersBy($attribute, $orders)
{
    $currentOrder = $orders[0][$attribute];
    $result = [];

    foreach ($orders as $order) {
        if ($order[$attribute] === $currentOrder) {
            $result[$currentOrder][] = $order;
        } else {
            $currentOrder = $order[$attribute];
            $result[$currentOrder][] = $order;
        }
    }

    return $result;
}
