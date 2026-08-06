<?php

/**
 * @Author Blackxes Fri Aug 07 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith;

class Bluesmith
{
    /**
     * Element tag name to processor mapping
     *
     * @var array<string, ElementProcessorInterface>
     */
    private $elementProcessorsConfig = [];

    /**
     * Element preprocessor. Processes the element before it gets passed onto the element processors
     *
     * @var ElementPreProcessorInterface
     */
    private $elementPreProcessor = null;

    /**
     * Is the parser initialized?
     *
     * @var boolean
     */
    private $initialized = false;

    public function init()
    {
        $this->elementProcessorsConfig = include __DIR__ . "/config/element_processors.php";
        $this->elementPreProcessor = (include __DIR__ . "/config/element_preprocessors.php")[0];

        return ($this->initialized = true);
    }

    /**
     * Parses an XML file containing model definitions and creates a definition object.
     * That object can then be used to generate sql statements, models, etc.
     */
    public function process(string $definitionFile)
    {
        if (!$this->initialized) {
            return new \Exception("Parser not initialized. Initialize it before usage.");
        }

        $definition = file_get_contents($definitionFile);
        $parsed = simplexml_load_string($definition);

        foreach ($parsed as $elementName => $element) {
            $this->processElement($elementName, $element);
        }
    }

    private function processElement(
        string $elementName,
        \SimpleXMLElement $element
    ) {
        $preProcessed = $this->elementPreProcessor::process($element);

        /**
         * https://github.com/DEVSENSE/phptools-docs/issues/1068
         *
         * I'm sure it doesn't really matter what I tried typing but I documented it regardless
         */

        // $processed = $this->elementProcessorsConfig[]

        // foreach ($preProcessed["__children"] as $elementName => $children) {
        //     $this->processElement($element);
        // }
    }
}
