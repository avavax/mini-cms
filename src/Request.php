<?php

declare(strict_types = 1);

namespace App;

class Request
{
    public static function getPOSTParams(array $array, $stripTags = true): array
    {
        return self::getParams($array, true, $stripTags);
    }

    public static function getGETParams(array $array, $stripTags = true): array
    {
        return self::getParams($array, false, $stripTags);
    }

    private static function getParams(array $array, bool $isPOST, $stripTags = true): array
    {
        $result = [];
        foreach ($array as $item) {

            if ($isPOST) {
                if (isset($_POST[$item])) {
                    $requestItem = trim($_POST[$item]);
                    $result[$item] = $stripTags ? strip_tags($requestItem) : $requestItem;
                } else {
                    $result[$item] = '';
                }
            } else {
                if (isset($_GET[$item])) {
                    $requestItem = trim($_GET[$item]);
                    $result[$item] = $stripTags ? strip_tags($requestItem) : $requestItem;
                } else {
                    $result[$item] = '';
                }
            }
        }
        return $result;
    }
}
