<?php

declare(strict_types = 1);

namespace App;

use App\Traits\TSingletone;

class Logger
{
    use TSingletone;

    public function writeLog(string $msg) {
        $path = $_SERVER['DOCUMENT_ROOT'] . LOG_FILE;
        $file = fopen($path, 'a');
        $msg = sprintf("[%s] \n%s \n\n", date('Y-m-d H:m'), $msg);
        fwrite($file, $msg);
        fclose($file);
    }
}
