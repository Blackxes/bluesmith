<?php

/**
 * @Author Alexander Bassov Tue Jun 16 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Core\DefinitionProcessing;

use Core\DefinitionProcessing\ModelGeneration\ModelFieldDefinition;
use Core\DefinitionProcessing\ModelGeneration\ModelFieldReferenceDefinition;
use SimpleXMLElement;

class RawModelFieldDefinitionProcessor
{
    /**
     * Processes a <field />
     * 
     * @param SimpleXMLElement $element A definition of a field
     * 
     * @return ModelFieldDefinition|\Exception
     */
    public function field(SimpleXMLElement $element)
    {
        $definition = (array) $element;
        $attributes = $definition["@attributes"];

        $field = new ModelFieldDefinition();
        $field->name = $attributes["name"];
        $type = $attributes["type"] ?? "not_defined";

        if (!case_exists(FieldTypeDatabaseTypeMapping::class, $attributes["type"])) {
            return new \Exception("Type '$type' of model field '$field->name' is not a valid type or not supported.");
        }

        $field->type = FieldTypeDatabaseTypeMapping::{strtoupper($attributes["type"])};
        $field->nullable = \array_key_exists("nullable", $attributes) ? (bool) $attributes["nullable"] : false;
        $field->defaultValue = \array_key_exists("default-value", $attributes) ? $attributes["default-value"] : false;
        $field->unique = \array_key_exists("unique", $attributes) ? (bool) $attributes["unique"] : false;;
        $field->uniqueGroup = \array_key_exists("unique-group", $attributes) ? $attributes["unique-group"] : null;

        return $field;
    }

    /**
     * Processes a <reference-field />
     * 
     * @param SimpleXMLElement $element A definition of a field reference
     * 
     * @return ModelFieldReferenceDefinition|\Exception
     */
    public function reference(SimpleXMLElement $element)
    {
        $field = new ModelFieldReferenceDefinition();
        $definition = (array) $element;
        $attributes = $definition["@attributes"];

        $field->name = $attributes["name"];
        $field->type = FieldTypeDatabaseTypeMapping::INT;
        $field->nullable = \array_key_exists("nullable", $attributes) ? (bool) $attributes["nullable"] : false;
        $field->defaultValue = \array_key_exists("default-value", $attributes) ? $attributes["default-value"] : false;
        $field->isUnique = \array_key_exists("unique", $attributes) ? (bool) $attributes["unique"] : false;;
        $field->uniqueGroup = \array_key_exists("unique-group", $attributes) ? $attributes["unique-group"] : null;

        return $field;
    }
}
