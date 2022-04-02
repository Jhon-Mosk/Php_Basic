<?php

function prepareVariables($page, $menuItems, $messages, $status, $action = '')
{
    $session = session_id();

    $params = [
        'layouts' => 'main',
        'menuItems' => menuRender($menuItems),
        'styles' => ['/css/global.css'],
        'session_id' => $session,
        'cart_count' => getCartCount($session),
        'allow' => false,
    ];

    if (is_auth()) {
        $params['allow'] = true;
        $params['user_login'] = getUserLogin();
    }

    switch ($page) {
        case 'login':
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            $params = doLoginAction($login, $pass, $params);

            $params['message'] = $messages[$_GET['message']];
            break;

        case 'logout':
            session_destroy();
            setcookie("hash");
            header("Location: /surfhouse");
            die();

        case 'index':
            $params['title'] = 'Главная';
            break;

        case 'surfhouse':
            $params['layouts'] = 'surfhouse';
            $params['styles'][] = '/css/surfhouse.css';
            $params['title'] = 'Surfhouse';
            $params['product_id'] = (int) $_GET['id'];
            $params['styles'][] = '/css/modal.css';
            $params['script'] = '/js/modal.js';

            $params = doCartAction($action, $params);
            $params['message'] = $messages[$_GET['message']];
            $params['firstCategoryProduct'] = getProduct('New products');
            $params['secondCategoryProduct'] = getProduct('top Products');
            $params['thirdCategoryProduct'] = getProduct('sale Products');
            $params['current_year'] = date('Y');
            break;

        case 'oneProduct':
            $params['textButton'] = 'Добавить';
            $params['action'] = 'add';

            $params = doFeedbackAction($action, $params);

            $params['message'] = $messages[$_GET['message']];
            $params['layouts'] = 'surfhouse';
            $params['title'] = 'Подробнее о товаре';
            $params['styles'][] = '/css/surfhouse.css';
            $params['product'] = getOneProduct((int) $_GET['id']);
            $params['feedbacks'] = getFeedback((int) $_GET['id']);
            $params['current_year'] = date('Y');
            $params['styles'][] = '/css/modal.css';
            $params['script'] = '/js/modal.js';
            break;

        case 'cart':
            $params['layouts'] = 'surfhouse';
            $params['styles'][] = '/css/surfhouse.css';
            $params['title'] = 'Корзина';
            $params['product_id'] = (int) $_GET['id'];
            $params['uniq_id'] = $_GET['uniqId'];

            $params['cart'] = getCart($session);
            $params['total'] = getSumCart($session);
            $params = doCartAction($action, $params);
            $params['message'] = $messages[$_GET['message']];
            $params['current_year'] = date('Y');
            $params['styles'][] = '/css/modal.css';
            $params['script'] = '/js/modal.js';
            break;

        case 'orders':
            $params['layouts'] = 'surfhouse';
            $params['styles'][] = '/css/surfhouse.css';
            $params['title'] = 'Заказы';
            $params['status'] = $status;

            $params['orders'] = getUserOrders($params['user_login']);

            $params['current_year'] = date('Y');
            $params['styles'][] = '/css/modal.css';
            $params['script'] = '/js/modal.js';
            break;

        case 'ordersManagement':
            if (!is_admin()) {
                header("Location: /surfhouse/?message=notAdmin");
                die();
            }

            $params['layouts'] = 'surfhouse';
            $params['styles'][] = '/css/surfhouse.css';
            $params['title'] = 'Управление заказами';
            $params['status'] = $status;
            $params['sess'] = $_GET['sess']; //сессия
            $params['orders'] = getAllOrders();

            $params = doOrdersManagementAction($action, $params);

            $params['current_year'] = date('Y');
            $params['styles'][] = '/css/modal.css';
            $params['script'] = '/js/modal.js';
            break;

        case 'catalog_ssr':
            $params['title'] = 'Каталог ssr';
            $params['catalog'] = getCatalog()['catalog'];
            break;

        case 'catalog_spa':
            $params['title'] = 'Каталог spa';
            break;

        case 'simpleCalc':
            if (isset($_POST)) {
                $params['result'] = mathOperation($_POST['arg1'], $_POST['arg2'], $_POST['operation']);
                $params['arg1'] = $_POST['arg1'];
                $params['arg2'] = $_POST['arg2'];
                $params['operation'] = $_POST['operation'];
            }
            $params['title'] = 'Простой калькулятор на <select>';
            break;

        case 'asyncCalc':
            $params['title'] = 'Калькулятор с async';
            $params['header_script'] = 'https://cdnjs.cloudflare.com/ajax/libs/mathjs/6.6.4/math.js';
            $params['script'] = '/js/calculator.js';
            $params['styles'][] = '/css/calculator.css';
            break;

        case 'asyncCalcApi':
            header('content-type: application/json');
            $data = json_decode(file_get_contents('php://input'));

            $result = mathOperation($data->{'arg1'}, $data->{'arg2'}, $data->{'operation'});
            echo json_encode($result, JSON_UNESCAPED_UNICODE);

            die();

        case 'gallery':
            if (!empty($_FILES)) {
                upload();
            }
            $params['message'] = $messages[$_GET['message']];
            $params['layouts'] = 'gallery';
            $params['title'] = 'Галерея';
            $params['styles'][] = '/css/gallery.css';
            $params['styles'][] = '/css/modal.css';
            $params['script'] = '/js/modal.js';
            $params['thumbnails'] = getSortThumbnails();
            _log($params, 'gallery');
            break;

        case 'oneImage':
            $id = (int)$_GET['id'];

            $params = doOneImageAction($action, $params, $id);

            $params['title'] = 'Изображение';
            $params['styles'][] = '/css/gallery.css';
            $params['styles'][] = '/css/oneImage.css';
            $params['styles'][] = '/css/modal.css';
            $params['script'] = '/js/modal.js';
            $params['image'] = getImage($id);
            break;

        case 'about':
            $params['title'] = 'О нас';
            $params['phone'] = 444333;
            break;

        case 'apicatalog':
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            die();

        default:
            $params = [];
            $params['404'] = true;
            $params['layouts'] = 'main';
            $params['title'] = '404 - not found';
            $params['styles'] = ['/css/404.css'];
            break;
    }

    return $params;
}
