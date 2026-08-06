<?php

/**
 * @Author Blackxes Fri Aug 07 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Bluesmith\ElementProcessing;

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
