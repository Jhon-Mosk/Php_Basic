<?php

function mathOperation($arg1, $arg2, $operation)
{
    if (function_exists($operation)) {
        return $operation((int) $arg1, (int) $arg2);
    }

    return "Такой операции нет";
}

function add($x, $y)
{
    return $x + $y;
}

function subtract($x, $y)
{
    return $x - $y;
}

function multiply($x, $y)
{
    return $x * $y;
}

function mod($x, $y)
{
    return $x % $y;
}

function divide($x, $y)
{
    return ($y != 0) ? $x / $y : "Делить на ноль нельзя";
}
