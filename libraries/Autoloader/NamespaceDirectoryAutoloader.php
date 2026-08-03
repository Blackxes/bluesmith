<?php

/**
 * @Author Alexander Bassov Mon Aug 01 2026
 * @Email blackxes.dev@gmail.com
 */

declare (strict_types = 1);

class NamespaceDirectoryAutoloader
{
    /**
     * Initialization state
     *
     * @var boolean
     */
    private static $initialized = false;

    private static $registeredRoots = [];
    /**
     * Directory to alias mapping
     */
    private static $aliases = [];

    public static function initialize($globalsDir = "Globals")
    {
        if (static::$initialized) {
            return true;
        }

        if (\is_dir($globalsDir)) {
            $base = $globalsDir;
            $files = \array_filter(
                \scandir($base),
                fn($v) => $v != "." && $v != ".."
            );

            foreach ($files as $file) {
                require_once "$base/$file";
            }
        }

        static::$initialized = true;
    }

    private static function integrateAlias(string $className)
    {
        $integratedClassName = $className;

        foreach (static::$aliases as $alias => $directory) {

        }

        return $integratedClassName;
    }

    public static function spl_autoload_callback(string $className)
    {
        static $initialized = false;

        static $directory = new RecursiveDirectoryIterator($root);
        static $flattened = new RecursiveIteratorIterator($directory);

        $namespaceCorrectedClassName = \str_replace("\\", DIRECTORY_SEPARATOR, $className);
        $quotedClassName = preg_quote($root . $namespaceCorrectedClassName . ".php");
        $found = new RegexIterator($flattened, "/.*$quotedClassName/i");

        foreach ($found as $file) {
            require_once $file->getPathname();
        }
    }

    public static function register(
        string $root,
        string $globalsDirectory = "",
        array $aliases = []
    ) {

        if (in_array($root, static::$registeredRoots)) {
            return true;
        }

        if (true == ($existingAliases = array_intersect(static::$aliases, $aliases))) {
            return new \Exception("Duplicate alias found: " . implode(", ", array_keys($existingAliases)));
        }

        array_push(static::$aliases, ...$aliases);

        $state = spl_autoload_register();

        if ($state) {
            static::$registeredRoots[] = $root;
        }
    }
}
