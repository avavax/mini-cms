<?php

declare(strict_types = 1);

namespace App;

class Request
{
    public static function getPOSTParams(array $array): array
    {
        $result = [];
        foreach ($array as $item) {

            if (isset($_POST[$item])) {
                $result[$item] = strip_tags(trim($_POST[$item]));
            } else {
                $result[$item] = '';
            }
        }
        return $result;
    }
}
