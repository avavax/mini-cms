<?php

declare(strict_types = 1);

namespace App\Interfaces;

use App\View\View;

interface CRUDInterface
{
    public function index($step, $page): View;

    public function delete(int $id): View;

    public function add(): View;

    public function edit(int $id): View;
}
