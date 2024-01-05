<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

abstract class Base
{
    protected static $file = null;
    protected static $resourceList = null;

    public static function all(bool $force = false): mixed
    {
        static::load($force);

        return static::$resourceList;
    }

    public static function find(string $slug, bool $force = false): mixed
    {
        static::load($force);

        return static::$resourceList
            ->where('slug', $slug)
            ->first();
    }

    public static function create(array $input): bool
    {
        static::load(true);

        static::$resourceList->prepend($input);

        return static::store();
    }

    public static function update(string $slug, array $input): bool
    {
        static::load(true);

        static::$resourceList = static::$resourceList
            ->map(function (mixed $item) use ($slug, $input) {
                if (($item['slug'] ?? null) === $slug) {
                    return $input;
                }

                return $item;
            });

        return static::store();
    }

    public static function delete(string $slug): bool
    {
        static::load(true);

        static::$resourceList = static::$resourceList
            ->filter(function (mixed $item) use ($slug) {
                return ($item['slug'] ?? null) !== $slug;
            })
            ->values();

        return static::store();
    }

    public static function get(string $key, bool $force = false): mixed
    {
        static::load($force);

        return static::$resourceList[$key] ?? null;
    }

    public static function set(string $key, mixed $data): bool
    {
        static::load(true);

        static::$resourceList[$key] = $data;

        return static::store();
    }

    public static function reset(): bool
    {
        static::$resourceList = null;

        return static::store();
    }

    private static function load(): void
    {
        if (static::$resourceList !== null && static::$resourceList instanceof Collection) {
            return;
        }

        $resourceListJson = Storage::disk('local')
            ->json(static::$file);

        if ($resourceListJson === null) {
            static::$resourceList = collect([]);

            Storage::disk('local')
                ->put(static::$file, static::$resourceList);
        }

        static::$resourceList = collect($resourceListJson);
    }

    private static function store(): bool
    {
        return Storage::disk('local')
            ->put(static::$file, json_encode(static::$resourceList, JSON_PRETTY_PRINT));
    }
}
