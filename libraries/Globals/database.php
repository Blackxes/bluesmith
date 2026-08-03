<?php

/**
 * @Author Alexander Bassov Mon Jun 15 2026
 * @Email blackxes.dev@gmail.com
 */

declare(strict_types=1);

namespace Core\Global;

class Database
{
    private static ?\PDO $connection = null;

    // Credentials
    private static string $host = "db";
    private static string $database = "anime_log";
    private static string $username = "root";
    private static string $password = "root";
    private static string $charset = "utf8mb4";

    private function __construct() {}

    public static function get()
    {
        if (static::$connection != null) {
            return static::$connection;
        }

        $dns = \sprintf("mysql:host=%s;dbname=%s;charset=%s", static::$host, static::$database, static::$charset);

        $pdo = new \PDO($dns, static::$username, static::$password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT, false);

        return (static::$connection = $pdo);
    }
}
