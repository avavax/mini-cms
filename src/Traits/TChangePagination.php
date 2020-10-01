<?php

declare(strict_types = 1);

namespace App\Traits;

use App\Request,
    App\View\View,
    App\Models\Pagination,
    App\Exceptions\NotFoundException;

trait TChangePagination
{
    public function index($step = 20, $page = 1): View
    {
        $this->isAccess();
        if (!is_numeric($page)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }
        if ((!is_numeric($step) && $step != 'all') || $step == '0' ) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        $step = $step == 'all' ? PHP_INT_MAX : $step;
        $params = [
            'title' => 'Админ-панель',
            'previews' => $this->getContentPart((int) $step, (int) $page),
            'pagination' => Pagination::getAdminPaginationParams(
                (int) $page,
                $this->contentCount(),
                static::SLUG,
                (int) $step
            )
        ];

        if (empty($params['previews'])) {
            return $this->index($step, 1);
        }

        return new View(static::TEMPLATES['all'], $params);
    }

    public function changePagination(): View
    {
         $step = Request::getPOSTParams(['pagination'])['pagination'];
        if (empty($step) && !is_numeric($step)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }
        return $this->index($step);
    }
}
