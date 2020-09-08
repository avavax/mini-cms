<?php

declare(strict_types = 1);

function array_get(array $array, string $key, $default = null): ?string
{
    $keyArr = explode('.', $key);

    foreach ($keyArr as $keyPart) {
        if (!isset($array[$keyPart])) {
            return $default;
        }
        $array = $array[$keyPart];
    }

    return is_string($array) ? $array : $default;
}
