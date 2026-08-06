<?php

/**
 * @Author Blackxes Fri Aug 07 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\Models;

use Bluesmith\Contracts\Models\ModelBase;

class ModelDefinition extends ModelBase
{
    public string $name;

    /**
     * If true this model won't be generated but only serves as template for others to extend from
     * 
     * @var bool
     */
    public bool $isAbstract = true;

    /**
     * @note Optional if isAbstract is true
     * 
     * @var string|null
     */
    public ?string $tableName = null;

    /**
     * @var ModelFieldDefinition[]
     */
    public array $fields = [];
}
