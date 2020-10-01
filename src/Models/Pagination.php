<?php

namespace App\Models;

class Pagination
{
    private const PAGINATION_GREED = [20, 50, 100, 200, 'all'];

    public static function getPaginationParams(
        int $current,
        int $maxItems,
        string $slug,
        int $step
    ): array
    {
        return [
            'current' => $current,
            'max' => (int) ceil($maxItems / $step),
            'slug' => $slug,
        ];
    }

    public static function getAdminPaginationParams(
        int $current,
        int $maxItems,
        string $slug,
        int $step
    ): array
    {
        return [
            'current' => $current,
            'max' => (int) ceil($maxItems / $step),
            'slug' => $slug,
            'step' => $step == PHP_INT_MAX ? 'all' : $step,
        ];
    }

    public static function getPaginationGreed()
    {
        return self::PAGINATION_GREED;
    }
}
