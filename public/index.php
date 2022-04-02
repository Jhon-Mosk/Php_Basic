<?php

session_start();

require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$page = 'index';

$url_array = explode('/', $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

$action = $url_array[2];

$menuItems = getMenuItems($menuItems);
$messages = getMessages($messages);
$status = getStatus($status);

$params = prepareVariables($page, $menuItems, $messages, $status, $action);

echo render($page, $params);
