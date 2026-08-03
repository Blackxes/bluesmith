<?php

/**
 * @Author Alexander Bassov Tue Jun 16 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

class ModelFieldReferenceDefinition extends ModelBase
{
    public string $name;
    public FieldTypeDatabaseTypeMapping $type = FieldTypeDatabaseTypeMapping::UNKNOWN;

    public ?string $referenceModel = null;

    public bool $nullable = true;

    public mixed $defaultValue = null;

    public bool $isUnique = false;

    public ?string $uniqueGroup = null;
}
