<?php

/**
 * @Author Alexander Bassov Tue Jun 16 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

if (!function_exists("case_exists")) {
    function case_exists(string $enum, string $case)
    {
        if (!enum_exists($enum)) {
            throw new \Exception("Given enum is not actually an enum.");
        }

        static $mappedEnums = [];

        if (!array_key_exists($enum, $mappedEnums)) {
            $mappedEnums[$enum] = array_map(fn($v) => strtolower($v->name), $enum::cases());
        }

        return in_array(strtolower($case), $mappedEnums[$enum]);
    }
}
