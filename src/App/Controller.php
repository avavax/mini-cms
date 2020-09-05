<?php

declare(strict_types = 1);

namespace App;

use App\View\View;

class Controller
{
    public function index(): View
    {
        return new View('index', ['title' => 'Index Page']);
    }

    public function about(): View
    {
        return new View('about', ['title' => 'About Company']);
    }
}
