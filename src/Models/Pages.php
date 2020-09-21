<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    private const DEFAULT_TEMPLATE = 'base';

    public function getAllPagesLink(): array
    {
        $result = [];
        $pages = self::select('id', 'title')->get();
        foreach ($pages as $page) {
            $result[$page->id] = $page->title;
        }
        return $result;
    }

    public function getTemplateName(string $name): string
    {
        /*$template = $name . '.php';
        $filepath = $_SERVER['DOCUMENT_ROOT'] . TEMPLATES_DIR . $template;
        return file_exists($filepath) ? $template : self::DEFAULT_TEMPLATE;*/

        $filepath = $_SERVER['DOCUMENT_ROOT'] . TEMPLATES_DIR . $name . '.php';
        return file_exists($filepath) ? $name : self::DEFAULT_TEMPLATE;
    }

    public function getTemplateList(): array
    {
        $list = [];
        $path = $_SERVER['DOCUMENT_ROOT'] . TEMPLATES_DIR;

        if (is_dir($path)) {
            $list = array_diff(scandir($path), ['.', '..']);
            return array_map(function($item) {
                return preg_replace('/\.php$/', '', $item);
            }, $list);
        }
        return $list;
    }

}
