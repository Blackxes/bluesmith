<?php

/**
 * @Author Alexander Bassov Sun Aug 02 2026
 * @Email blackxes.dev@gmail.com
 */

declare (strict_types = 1);

require_once __DIR__ . "/Bluesmith.php";

NamespaceDirectoryAutoloader::register(
    __DIR__,
    [
        "\Bluesmith" => __DIR__,
    ]
);
