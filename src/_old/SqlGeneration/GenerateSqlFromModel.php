<?php

/**
 * @Author Alexander Bassov Tue Jun 16 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Core\DefinitionProcessing\SqlGeneration;

use Core\DefinitionProcessing\ModelGeneration\ModelDefinition;

class GenerateSqlFromModel
{

    private const string DEFAULT_OUTPUT_DIR = PROJECT_ROOT . "/cache/models";

    /**
     * Takes an array of models and orders them by their dependencies.
     * The returned array can be forwardly iterated and initialized
     * without respecting the initialization order.
     * 
     * @param ModelDefinition[] $models
     * @return ModelDefinition[]
     */
    private static function orderModelDependencies(array $models)
    {
        return $models;
    }

    public static function generate(ModelDefinition $definition, ?string $outputDir = null)
    {

        if ($definition->isAbstract) {
            return false;
        }

        debug("Definition", $definition);

        $usedOutputDir = $outputDir ?? static::DEFAULT_OUTPUT_DIR;
        $queryArray = [];
    }


    // <model name="SessionAttendeeLog" table-name="vs_session_attendee_log" extends="model-base">
    //     <reference-field name="viewing_session_uid" unique-group="unique_missing_session_user" nullable="false" />
    //     <reference-field name="viewer_uid" unique-group="unique_missing_session_user" nullable="false" />
    //     <reference-field name="description_uid" unique-group="unique_missing_session_user" nullable="false" />
    //     <field name="custom_description" type="text" />
    // </model>

    // CREATE TABLE vs_session_attendee_log (
    //     uid INT PRIMARY KEY AUTO_INCREMENT,
    //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    //     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //     viewing_session_uid INT NOT NULL,
    //     viewer_uid INT NOT NULL,
    //     description_uid INT NULL,
    //     custom_description TEXT NOT NULL,
    //     FOREIGN KEY (viewing_session_uid) REFERENCES vs_viewing_sessions(uid) ON DELETE CASCADE,
    //     FOREIGN KEY (viewer_uid) REFERENCES vs_viewers(uid) ON DELETE CASCADE,
    //     FOREIGN KEY (description_uid) REFERENCES vs_common_attendance_changes(uid) ON DELETE CASCADE,
    //     UNIQUE KEY unique_missing_session_user (viewing_session_uid, viewer_uid, description_uid)
    // );

}
