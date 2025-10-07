<?php

declare(strict_types=1);

namespace App\Support;

final class Config
{
    private static array $items = [];

    public static function set(string $key, array $value): void
    {
        self::$items[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return self::$items[$key] ?? $default;
    }
}
