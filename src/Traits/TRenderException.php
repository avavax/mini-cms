<?php

declare(strict_types = 1);

namespace App\Traits;

use App\View\View;

trait TRenderException
{
    private function showException(\Exception $e)
    {
        $errorCode = (int) ($e->getCode() ?: 500);
        http_response_code($errorCode);

        $params = [
            'title' => "Error {$errorCode}",
            'message' => $e->getMessage(),
            'error' => $errorCode,
        ];

        $page = $errorCode == '404' ? 'e404' : 'errors';
        (new View($page, $params))->render();
    }
}
