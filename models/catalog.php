<?php

function getCatalog()
{
    return [
        'catalog' => [
            [
                'name' => 'Пицца',
                'price' => 24,
                'img' => IMAGES_DIR_CATALOG . 'pizza.jpeg'
            ],
            [
                'name' => 'Чай',
                'price' => 1,
                'img' => IMAGES_DIR_CATALOG . 'tea.png'
            ],
            [
                'name' => 'Яблоко',
                'price' => 12,
                'img' => IMAGES_DIR_CATALOG . 'apple.jpg'
            ],
        ]
    ];
}
