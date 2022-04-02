<?php

$status = [
    'await' => 'Ждёт обработки',
    'process' => 'В процессе обработки',
    'finish' => 'Завершён',
    'delete' => 'Отменён',
];

function getStatus($status)
{
    return $status;
}
