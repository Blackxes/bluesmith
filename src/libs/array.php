<?php

/**
 * @Author Alexander Bassov Sun Mar 01 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

if (!function_exists("array_first")) {
    function array_first(array $array)
    {
        if (count($array) == 0) {
            return null;
        }

        return $array[array_keys($array)[0]];
    }
}

if (!function_exists("array_last")) {
    function array_last(array $array)
    {
        if (count($array) == 0) {
            return null;
        }

        return $array[array_keys($array)[count($array) - 1]];
    }
}
