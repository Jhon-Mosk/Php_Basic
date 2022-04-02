<?php

$menuItems = [
    [
        "title" => "Главная",
        "href" => "/"
    ],
    [
        "title" => "Surfhouse",
        "href" => "/surfhouse",
        "subitems" => [
            [
                "title" => "мои Заказы",
                "href" => "/orders"
            ],
            [
                "title" => "Каталог spa",
                "href" => "/catalog_spa"
            ],
            [
                "title" => "Каталог ssr",
                "href" => "/catalog_ssr"
            ],
        ]
    ],
    [
        "title" => "Калькулятор",
        "href" => "/calc",
        "subitems" => [
            [
                "title" => "Простой калькулятор на select",
                "href" => "/simpleCalc"
            ],
            [
                "title" => "Калькулятор с async",
                "href" => "/asyncCalc"
            ],
        ]
    ],
    [
        "title" => "Галерея",
        "href" => "/gallery"
    ],
    [
        "title" => "О нас",
        "href" => "/about"
    ],
];

function getMenuItems($menuItems)
{
    return $menuItems;
}

function menuRender($menu_array)
{
    $result = fillMenu($menu_array);

    if (is_admin()) {
        $result .= "<a href='/ordersManagement'>Управление заказами</a>";
    }

    return $result;
}

function fillMenu($menu_array)
{
    $result = "";

    foreach ($menu_array as $item) {
        $result .= "<a href='{$item['href']}'>{$item['title']}</a>";

        if (isset($item["subitems"])) {
            $result .= fillMenu($item["subitems"]);
        }
    }

    return $result;
}
