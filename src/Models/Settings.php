<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Settings extends Model
{
    protected $table = 'settings';

    public function getSettings(): array
    {
        $result = [];
        $settings = self::All();
        foreach ($settings as $setting) {
            if ($setting->is_html == 1) {
                $result[$setting->title] = htmlspecialchars($setting->property);
            } else {
               $result[$setting->title] = $setting->property;
            }
        }
        return $result;
    }

    public Function updateSettings(array $settings)
    {

        foreach ($settings as $title => $property) {

            $isHtml = self::where('title', $title)
                //->select('is_html')
                ->first()
                ->is_html;
            $property = $isHtml == 0 ? $property : htmlspecialchars_decode($property);
            self::where('title', $title)
                ->update(['property' => $property]);
        }
    }

}
