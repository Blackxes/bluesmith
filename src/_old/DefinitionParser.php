<?php

/**
 * @Author Alexander Bassov Mon Jun 15 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

// namespace Core\DefinitionProcessing;

use Core\DefinitionProcessing\ModelGeneration\ModelDefinition;

require_once __DIR__ . "/FieldTypeDatabaseTypeMapping.php";
require_once __DIR__ . "/RawModelFieldDefinitionProcessor.php";
require_once __DIR__ . "/ModelGeneration/ModelDefinition.php";
require_once __DIR__ . "/ModelGeneration/ModelFieldDefinition.php";
require_once __DIR__ . "/ModelGeneration/ModelFieldReferenceDefinition.php";

/**
 * Takes an xml definition file and processes into a definition object.
 */
class DefinitionParser
{
    /**
     * Generates definition objects from xml definition files.
     * These objects are an easier to process representation of the xml definitions.
     * 
     * @param string $definitionFile
     * @param mixed $outputDirectory
     * @return bool|ModelDefinition[]
     */
    public function generate(string $definitionFile, ?string $outputDirectory = null)
    {
        $definition = file_get_contents($definitionFile);
        $parsed = simplexml_load_string($definition);
        $baseModels = [];
        $errors = [];

        if (!property_exists($parsed, "model")) {
            return true;
        }

        $models = [];

        foreach ($parsed->model as $modelDefinitionObject) {
            $models[] = $this->processRawModelDefinition($modelDefinitionObject);
        }

        return $models;
    }

    public function processRawModelDefinition(SimpleXMLElement $element)
    {
        $definition = (array) $element;

        debug($definition);
        exit;

        $attributes = $definition["@attributes"];
        $modelName = $attributes["name"];

        $model = new ModelDefinition();
        $model->name = $modelName;
        $model->tableName = $attributes["tableName"] ?? null;
        $model->isAbstract = \array_key_exists("abstract", $attributes) ? (bool) $attributes["abstract"] : false;

        $processor = new RawModelFieldDefinitionProcessor();

        // Fields
        foreach ($definition["field"] ?? [] as $rawFieldDefinition) {
            $model->fields[] = $processor->field($rawFieldDefinition);
        }

        // Field references
        foreach ($definition["reference-field"] ?? [] as $rawFieldDefinition) {
            $model->fields[] = $processor->reference($rawFieldDefinition);
        }

        return $model;


        // $attributes = (array) $modelDefinitionObject->attributes();
        // $modelName = 

        // if ($modelName == null) {
        //     $errors[] = new \Exception("Model definition is missing the 'name' attributes");
        //     continue;
        // }

        // if (!property_exists($modelDefinitionObject, "field")) {
        //     $errors[] = new \Exception("Skipping field '{$modelName}'");
        //     continue;
        // }

        // $field = $processor->field($modelDefinitionObject->field);

        // if ($field instanceof \Exception) {
        //     $errors[$modelName][] = $field;
        //     continue;
        // }
    }
}
