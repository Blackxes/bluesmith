<?php

/**
 * @Author Alexander Bassov Fri Jun 19 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Core\DefinitionProcessing\SqlGeneration;

class SqlFromModelReturn
{
    /**
     * Names of models which definition is missing.
     * Can be used to process these models later
     * 
     * @var string[]
     */
    public array $missingModels = [];

    /**
     * Generated SQL queries of create table statements of models
     * 
     * @var string[]
     */
    public array $generatedQueries = [];
}
