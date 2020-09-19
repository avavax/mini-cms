<?php

declare(strict_types = 1);

namespace App\Interfaces;

use App\View\View;

interface ListableInterface
{
    public function index($step, $page): View;

    public function changePagination(): View;
}
