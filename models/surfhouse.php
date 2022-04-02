<?php

$products = [
    [
        "category" => "New products",
        "items" => [
            [
                "name" => "Single Thruster 2014",
                "actualPrice" => "865.00",
                "oldPrice" => "0",
                "address" => "/img/surfhouse/products/surf1.jpg",
                "description" => "Single Thruster 2014",
                "corner" => "productUnitNew",
            ],
            [
                "name" => "Freestyle Wave FSW",
                "actualPrice" => "770.50",
                "oldPrice" => "1,270.15",
                "address" => "/img/surfhouse/products/surf2.jpg",
                "description" => "Freestyle Wave FSW",
                "corner" => "productUnitHot",
            ],
            [
                "name" => "The White Collection
                SURFBOARD 2014",
                "actualPrice" => "1,580.70",
                "oldPrice" => "0",
                "address" => "/img/surfhouse/products/surf3.jpg",
                "description" => "The White Collection
                SURFBOARD 2014",
                "corner" => "",
            ],
            [
                "name" => "OG SCALLOP SOLID",
                "actualPrice" => "765.00",
                "oldPrice" => "0",
                "address" => "/img/surfhouse/products/surf4.jpg",
                "description" => "OG SCALLOP SOLID",
                "corner" => "",
            ],
            [
                "name" => "STRIPE 19 QS",
                "actualPrice" => "230.50",
                "oldPrice" => "0",
                "address" => "/img/surfhouse/products/surf5.jpg",
                "description" => "STRIPE 19 QS",
                "corner" => "",
            ],
            [
                "name" => "YOKE 19 QS",
                "actualPrice" => "1,130.70",
                "oldPrice" => "0",
                "address" => "/img/surfhouse/products/surf6.jpg",
                "description" => "YOKE 19 QS",
                "corner" => "",
            ],
        ],
    ],
    [
        "category" => "top Products",
        "items" => [
            [
                "name" => "Ushingham
                Lightning 2014",
                "actualPrice" => "2,960.95",
                "oldPrice" => "3,100.15",
                "address" => "/img/surfhouse/products/springsuit1.jpg",
                "description" => "Ushingham
                Lightning 2014",
                "corner" => "",
            ],
            [
                "name" => "CYPHER HEAT VES M",
                "actualPrice" => "849.95",
                "oldPrice" => "0",
                "address" => "/img/surfhouse/products/springsuit2.jpg",
                "description" => "CYPHER HEAT VES M",
                "corner" => "",
            ],
            [
                "name" => "SYNCRO WOMENS
                QS M",
                "actualPrice" => "1,110.99",
                "oldPrice" => "0",
                "address" => "/img/surfhouse/products/springsuit3.jpg",
                "description" => "SYNCRO WOMENS
                QS M",
                "corner" => "",
            ],
        ],
    ],
    [
        "category" => "sale Products",
        "items" => [
            [
                "name" => "SYNCRO MENS QS M",
                "actualPrice" => "249.95",
                "oldPrice" => "450.15",
                "address" => "/img/surfhouse/products/rashguard.jpg",
                "description" => "SYNCRO MENS QS M",
                "corner" => "",
            ],
            [
                "name" => "RAMOS - SHIRT FOR MEN",
                "actualPrice" => "459.65",
                "oldPrice" => "570.65",
                "address" => "/img/surfhouse/products/springsuit2.jpg",
                "description" => "RAMOS - SHIRT FOR MEN",
                "corner" => "",
            ],
            [
                "name" => "SixSixOne Evo Wired Full Face",
                "actualPrice" => "240.00",
                "oldPrice" => "370.65",
                "address" => "/img/surfhouse/products/springsuit3.jpg",
                "description" => "SixSixOne Evo Wired Full Face",
                "corner" => "",
            ],
        ],
    ],
];

function fillSurfhouseProducts($products)
{
    $category = "";
    foreach ($products as $categoryType) {
        $category = $categoryType['category'];
        if (isset($categoryType['items'])) {
            foreach ($categoryType['items'] as $item) {
                addProduct($item['name'], $item['actualPrice'], $item['oldPrice'], $item['address'], $item['description'], $item['corner'], $category);
            }
        }
    }
}

// fillSurfhouseProducts($products);

function getProduct($categoryName)
{
    return getAssocResult("SELECT * FROM `product` WHERE `category` = '$categoryName'");
}

function getOneProduct($id)
{
    return getOneResult("SELECT * FROM `product` WHERE `id` = '$id'");
}

function addProduct($name, $actualPrice, $oldPrice, $address, $description, $corner, $category)
{
    executeSql("INSERT INTO `product`(`name`, `actualPrice`, `oldPrice`, `address`, `description`, `corner`, `category`) VALUES ('$name','$actualPrice','$oldPrice','$address','$description','$corner','$category')");
}
