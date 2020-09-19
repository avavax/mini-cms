<?php

namespace App\Models;

class Images
{
    const MAX_AVATAR_SIZE = 2097152;
    const MAX_ARTICLE_IMAGE_SIZE = 2097152;
    const ALLOWED_IMG_TYPES = ['image/jpeg', 'image/png', 'image/pjpg', 'image/gif', 'image/bmp'];

    public function save(array $file, string $path): array
    {
        $result = [
            'errors' => '',
            'name' => '',
        ];
        if (empty($file['name'])) {
            $result['errors'] = 'Ошибка передачи файла';
            return $result;
        }

        $result['errors']  = $this->loadedImageChecked($file);
        if (empty($result['errors'] )) {

            $extention = (new \SplFileInfo($file['name']))->getExtension();
            $newName = date('Y-m-d-') . uniqid() . '.jpg';

            if (!$this->convertImage(
                $file['tmp_name'],
                $path . $newName,
                $extention
            )) {
                $result['errors'] .= 'Ошибка загрузки изображения';
            } else {
                $result['name'] = $newName;
            }
        }
        return $result;
    }

    private function loadedImageChecked(array $file, $imgPlace = 'avatar') : string
    {
        $errors = '';
        $maxSize = $imgPlace == 'avatar' ? self::MAX_AVATAR_SIZE : self::MAX_ARTICLE_IMAGE_SIZE;

        if ($file['error']) {
            $errors .= 'Ошибка при загрузке изображения<br>';
        }
        if ($file['name'] == '') {
           $errors .= 'Некорректное имя файлa изображение<br>';
        }
        if ($file['size'] > $maxSize) {
           $errors .= 'Файл изображения превышает допустимый размер<br>';
        }
        if (!$this->imageTypeChecked($file['tmp_name'])) {
           $errors .= 'Файл изображения имеет недопустимый тип<br>';
        }
        return $errors;
    }

    private function imageTypeChecked(string $filename) : bool
    {
        return in_array(mime_content_type($filename), self::ALLOWED_IMG_TYPES);
    }

    private function convertImage(
        string $originalImage,
        string $outputImage,
        string $extention,
        int $quality = 50
    ): bool
    {
        switch ($extention) {
            case 'jpg':
            case 'jpeg':
                $imageTmp = imagecreatefromjpeg($originalImage);
                break;
            case 'bmp':
                $imageTmp = imagecreatefrombmp($originalImage);
                break;
            case 'gif':
                $imageTmp = imagecreatefromgif($originalImage);
                break;
            case 'png':
                $imageTmp = imagecreatefrompng($originalImage);
                break;
            default:
                return false;
                break;
        }

        imagejpeg($imageTmp, $outputImage, $quality);
        imagedestroy($imageTmp);

        return true;
    }
}
