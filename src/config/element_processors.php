<?php

/**
 * @Author Alexander Bassov Sat Aug 01 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

use Bluesmith\ElementProcessing\Processors\FieldElementProcessor;
use Bluesmith\ElementProcessing\Processors\FieldReferenceElementProcessor;
use Bluesmith\ElementProcessing\Processors\ModelElementProcessor;

/**
 * @todo Add validation
 */
return [
    "model" => ModelElementProcessor::class,
    "field" => FieldElementProcessor::class,
    "field-reference" => FieldReferenceElementProcessor::class
];
