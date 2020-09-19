<?php

declare(strict_types = 1);

namespace App\Controllers\Admin;

use App\Request,
    App\View\View,
    App\Models\Settings,
    App\Exceptions\NotFoundException,
    App\Traits\TIsAccess;

class AdminSettingsController
{
    use TIsAccess;

    protected const ADMIN_ONLY = true;
    private $data = [];
    private $message;

    public function index(): View
    {
        $this->isAccess();

        $params = [
            'title' => 'Админ-панель',
            'data' => (new Settings())->getSettings(),
            'message' => $this->message,
        ];

        return new View('admin/settings', $params);
    }

    public function save(): View
    {
        (new Settings())->updateSettings($this->prepareRequest());
        $this->message = 'Изменения успешно внесены';
        return $this->index();
    }

    private function prepareRequest()
    {
        $result = Request::getPOSTParams(['keywords', 'description', 'title', 'subtitle']);
        return array_merge(
            $result,
            Request::getPOSTParams(['footerLeft', 'footerCenter', 'footerRight'], false)
        );
    }
}
