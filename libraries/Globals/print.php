<?php

declare(strict_types=1);

/**
 * @Author Alexander Bassov Fri Feb 20 2026
 * @Email blackxes.dev@gmail.com
 */

if (!function_exists("debug")) {
    if (php_sapi_name() != "cli") {
        /**
         * @param array $values
         */
        function debug(...$values)
        {
            foreach ($values as $value) {
                echo "<pre>";
                print_r($value);
                echo "</pre>";
            }
        }
    } else {
        /**
         * @param array $values
         */
        function debug(...$values)
        {
            foreach ($values as $value) {
                print_r($value);
                echo "\n";
            }
        }
    }
}


if (!function_exists("vdebug")) {
    if (php_sapi_name() != "cli") {
        /**
         * @param array $values
         */
        function vdebug(...$values)
        {
            foreach ($values as $value) {
                echo "<pre>";
                var_dump($value) . PHP_EOL;
                echo "</pre>";
            }
        }
    } else {
        /**
         * @param array $values
         */
        function vdebug(...$values)
        {
            foreach ($values as $value) {
                var_dump($value);
                echo "\n";
            }
        }
    }
}
