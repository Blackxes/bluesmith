<?php

/**
 * @Author Alexander Bassov Tue Jun 16 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\Models;

class ModelFieldDefinition extends ModelBase
{
    public string $name;
    public FieldTypeDatabaseTypeMapping $type = FieldTypeDatabaseTypeMapping::UNKNOWN;

    public bool $nullable = true;

    public mixed $defaultValue = null;

    public bool $unique = false;

    public ?string $uniqueGroup = null;
}
