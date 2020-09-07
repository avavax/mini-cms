<?php

declare(strict_types = 1);

namespace App\Traits;

use App\View\View;

trait TRenderException
{
    private function showException(\Exception $e)
    {
        $errorCode = $e->getCode() ?: 500;
        http_response_code($errorCode);

        $params = [
            'title' => "Error {$errorCode}",
            'message' => $e->getMessage(),
            'error' => $errorCode,
        ];
        (new View('errors', $params))->render();
    }
}
