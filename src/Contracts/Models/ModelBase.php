<?php

/**
 * @Author Blackxes Fri Aug 07 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\Contracts\Models;

abstract class ModelBase
{
    public static function fromModel(ModelBase $model, array $overrides = [])
    {


        $new = new static();

        $commonProperties = \array_intersect(
            \array_keys(\get_class_vars($new::class)),
            \array_keys(\get_class_vars($model::class))
        );

        foreach ($commonProperties as $propertyName) {
            $new->{$propertyName} = \array_key_exists($propertyName, $overrides)
                ? $overrides[$propertyName]
                : $model->{$propertyName};
        }

        return $new;
    }

    public static function fromArray(array $values)
    {
        $new = new static();
        $commonProperties = \array_intersect(\get_class_vars($new::class), \array_keys($values));

        foreach ($commonProperties as $propertyName) {
            $new->{$propertyName} = $values[$propertyName];
        }

        return $new;
    }
}
