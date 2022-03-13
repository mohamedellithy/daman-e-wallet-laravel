<?php
namespace App\Services;
use App\Setting;
class SettingService{

    private static $instance = null;
    private $setting = [];

     private function __construct(){
        $settings = Setting::select('value','name')->get();
        $this->setting = $settings;
    }

    public static function getInstance(){
        if(!self::$instance){
            return self::$instance = new SettingService();
        }

        return self::$instance;
    }

    public function getSetting(){
        return $this->setting;
    }
}
