<?php

namespace App\Libs;

class App
{
    protected static array $globals = [];

    public static function set(string $key, mixed $value): void
    {
        self::$globals[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return self::$globals[$key] ?? $default;
    }

    public static function all(): array
    {
        return self::$globals;
    }
}


