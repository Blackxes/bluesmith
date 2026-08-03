<?php

/**
 * @Author Alexander Bassov Tue Jun 16 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Core\DefinitionProcessing;

enum FieldTypeDatabaseTypeMapping: string
{
    // Invalid type used for initializations
    case UNKNOWN = "unknown";
    case INT = "int";
    case BOOL = "bool";
    case STRING = "varchar";
    case TEXT = "text";
    case DATE = "timestamp";
    case TIME = "time";
}
