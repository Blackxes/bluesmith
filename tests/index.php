<?php

/**
 * @Author Blackxes Tue Aug 04 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";

use Bluesmith\Bluesmith;

$instance = new Bluesmith();
$instance->init();
$instance->process(__DIR__ . "/definitions.xml");