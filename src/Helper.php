<?php

namespace AsiaYo;

class Helper
{
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
            $fraction = $number - (int) $number;
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
}
