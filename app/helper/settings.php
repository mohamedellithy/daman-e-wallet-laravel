<?php
use App\Services\SettingService;
function Option($option){
    $settings        = SettingService::getInstance()->getSetting();
    return collect($settings)->where("name","{$option}")->first()->value ?? null;
}


