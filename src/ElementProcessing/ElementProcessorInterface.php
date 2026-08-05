<?php

/**
 * @Author Alexander Bassov Sat Aug 01 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\ElementProcessing;

interface ElementProcessorInterface
{
    public static function process(array $preProcessed): array;
    public static function getElementName(): string;
}
