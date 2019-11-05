<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Setting extends Model
{
    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var array
     */
    protected $fillable = ['key', 'value'];

    /**
     * Getter method by settings key
     *
     * @param $key
     */
    public static function get($key)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->first();

        if (!$entry) {
            return;
        }

        return $entry->value;
    }

    public static function set($key, $value = null)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->findOrFail();
        $entry->value = $value;
        $entry->saveOrFail();
        Config::set('key', $value);
        if(Config::get($key) == $value){
            return true;
        }
        return false;
    }

}
