<?php

/**
 * @Author Alexander Bassov Sat Aug 01 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\ElementProcessing\Processors;

use Bluesmith\ElementProcessing\ElementProcessorInterface;

class FieldReferenceElementProcessor implements ElementProcessorInterface
{
    #[\Override]
    public static function process(array $preProcessedElement): array
    {
        throw new \Exception('Not implemented');
    }

    #[\Override]
    public static function getElementName(): string
    {
        throw new \Exception('Not implemented');
    }
}
