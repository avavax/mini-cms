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

function article_excerpt(string $text, $length = 100): string
{
    $text = strip_tags($text);

    if (mb_strlen($text) > $length + 3) {
        $text = mb_substr($text, 0, $length);
    }

    return $text . '...';
}

function check_email(string $email): bool
{
    return (bool) preg_match('/.+@.+\..+/i', $email);
}
