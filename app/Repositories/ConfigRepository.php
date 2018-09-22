<?php

namespace App\Repositories;

use App\Models\Config;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Http\Validators\DeviceValidator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\AppRepository;
use Carbon\Carbon;

class ConfigRepository extends BaseRepository
{
    use AppRepository;

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Config::class;
    }

    public static function getConfig()
    {
        $config = Config::first();
        if (is_null($config)) {
            Config::insert([
                'is_show_nf' => true,
                'style_notification' => CONFIG_STYLE_NOTIFICATION_BASIC,
            ]);
        };
        return Config::first();
    }

    public function updateConfig($data)
    {
        $config = $this->getConfig();
        $config->is_show_nf = 0;
        if (isset($data['is_show_nf'])) {
            if ($data['is_show_nf'] == 'on') {
                $config->is_show_nf = 1;
            }
        } 
        if (isset($data['style_notification'])) $config->style_notification = $data['style_notification'];
        $config->save();
        return true;
    }
}
