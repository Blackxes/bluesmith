<?php

/**
 * @Author Blackxes Fri Aug 07 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\ElementProcessing\Processors;

use Bluesmith\Contracts\ElementProcessing\ElementProcessorInterface;

class FieldElementProcessor implements ElementProcessorInterface
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
