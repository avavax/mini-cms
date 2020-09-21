<?php

declare(strict_types = 1);

namespace App\Controllers\Admin;

use App\Request,
    App\View\View,
    App\Models\Users,
    App\Models\Images,
    App\Models\Pagination,
    App\Exceptions\NotFoundException,
    App\Interfaces\CRUDInterface,
    App\Interfaces\ListableInterface,
    App\Traits\TIsAccess,
    App\Traits\TChangePagination;

abstract class ContentController implements CRUDInterface, ListableInterface
{
    use TIsAccess;
    use TChangePagination;

    protected $data = [];
    protected $errors = [];
    protected $message = '';

    public function delete($id): View
    {
        $this->isAccess();
        if (!is_numeric($id)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }
        $this->contentDelete($id);
        return $this->index();
    }

    public function add(): View
    {
        $this->isAccess();
        $params = [
            'title' => 'Админ-панель',
            'data' => $this->data,
            'errors' => $this->errors,
            'message' => $this->message,
        ];
        return new View(static::TEMPLATES['add'], $params);
    }

    public function edit($id): View
    {
        $this->isAccess();
        if (!is_numeric($id)) {
            throw new NotFoundException('Запрашиваемая страница не найдена или удалена', 404);
        }

        $params = [
            'title' => 'Админ-панель',
            'data' => $this->getContentById((int) $id),
        ];
        return new View(static::TEMPLATES['add'], $params);
    }

    public function save(): View
    {
        $this->isAccess();

        $request = $this->getPOSTRequest();
        $this->errors = $this->contentCheck($request);

        if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
            $path = $_SERVER['DOCUMENT_ROOT'] . ASSETS_DIR . '/img/blog/';
            $saveImgResult = (new Images())->save($_FILES['image'], $path);

            if(!empty($saveImgResult['errors'])) {
                $this->errors = array_merge($this->errors, ['img' => $saveImgResult['errors']]);
            }
        }

        if (isset($saveImgResult)) {
            // With new image
            $this->data = $this->contentDataPrepare($request, $saveImgResult['name']);
        } else {
            // Without new image
            $this->data = $this->contentDataPrepare($request, $request['oldImg']);
        }

        if (empty($this->errors)) {
            if (empty($this->data['id'])) {
                // Create new
               $this->data['id'] = $this->contentSave();
               $this->message = 'Статья добавлена';
            } else {
                // Update
                $this->contentSave((int) $this->data['id']);
                $this->message = 'Изменения сохранены';
            }
        }
        return $this->add();
    }

    abstract protected function getContentPart(int $step, int $page): array;

    abstract protected function getContentById(int $id): array;

    abstract protected function contentCount(): int;

    abstract protected function contentDelete($id);

    abstract protected function contentDataPrepare(array $request, string $img): array;

    abstract protected function contentSave($id = null): int;

    abstract protected function contentCheck(array $request): array;

    abstract protected function getPOSTRequest(): array;
}
