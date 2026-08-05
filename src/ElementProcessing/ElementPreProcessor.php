<?php

/**
 * @Author Alexander Bassov Sat Aug 01 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\ElementProcessing;

use Bluesmith\Contracts\ElementProcessing\ElementPreProcessorInterface;

class ElementPreProcessor implements ElementPreProcessorInterface
{
    #[\Override]
    public static function process(\SimpleXMLElement $element): array
    {
        $definition = (array) $element;
        // Allows for easy iteration without special condition for attributes
        $attributes = (array) $definition["@attributes"];
        unset($definition["@attributes"]);

        $processed = [...$attributes];

        foreach ($definition as $elementName => $children) {
            $processed["__children"][$elementName] = $children;
        }

        return $processed;
    }
}
