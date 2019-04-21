<?php

namespace App;

class Helper
{
    // 不用 php number_format 的方式
    public static function f($number): string
    {
        if (!is_numeric($number)) {
            return "Input should be number type!";
        }

        if ($number / 1000 < 1 && $number / 1000 > -1) {
            return (string) $number;
        }

        $isNegative = false;
        if ($number < 0) {
            $number = -($number);
            $isNegative = true;
        }

        $stack = static::pushGroupToStack($number);
        $result = static::popGroupToResultString($stack);

        return $isNegative ? '-' . $result : $result;
    }

    protected static function pushGroupToStack($number, array $stack = []): array
    {
        while ($number / 1000 >= 1) {
            // 避免用 $number - {(int) $number, floor($number)} 會不精確之情形
            $fraction = '0.' . substr(strrchr((string )$number, '.'), 1);
            $remainder = $number % 1000;
            array_push($stack, $remainder + $fraction);
            $number = ($number - $remainder - $fraction) / 1000;
        }

        if ($number != 0) {
            array_push($stack, $number);
        }

        return $stack;
    }

    protected static function popGroupToResultString(array $stack, string $result = ''): string
    {
        while (!empty($stack)) {
            $result .= ',' . array_pop($stack);
        }

        return ltrim($result, ',');
    }

    public static function f2($number)
    {
        if (!is_numeric($number)) {
            return "Input should be number type!";
        }

        if (is_int($number)) {
            return number_format($number);
        }

        $fraction = substr(strrchr($number, '.'), 1);

        return number_format($number, strlen($fraction), '.', ',');
    }
}
