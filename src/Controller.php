<?php

declare(strict_types = 1);

namespace App;

use App\View\View,
    App\Models\Books as Books;

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

    public function books(): View
    {
        $books = Books::all();
        return new View('books', ['title' => 'Books', 'books' => $books]);
    }
}
