<?php

function render($page, $params = [])
{
    if ($params['404']) {
        $page = 404;
    }
    return renderTemplate(
        LAYOUTS_DIR . $params['layouts'],
        [
            'title' => $params['title'],
            'header_script' => $params['header_script'],
            'styles' => $params['styles'],
            'script' => $params['script'],
            'message' => $params['message'],
            'cart_count' => $params['cart_count'],
            'current_year' => $params['current_year'],
            'auth' => renderTemplate('auth', $params),
            'menu' => renderTemplate('menu', $params),
            'content' => renderTemplate($page, $params)
        ]
    );
}

function renderTemplate($page, $params = [])
{

    ob_start();

    extract($params);    // то же что - foreach ($params as $key => $value)  $$key = $value;

    include TEMPLATES_DIR . $page . ".php";

    return ob_get_clean();
}
