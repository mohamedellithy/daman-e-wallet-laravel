<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // set settings web application
        $setting = [
            [
                'name' => 'Currencies',
                'value'=> json_encode([
                    [
                      'currency' => 'USD',
                      'name_ar'  => 'الدولار الامريكي',
                      'name_en'  => 'American Dollar'
                    ],
                    [
                      'currency' => 'EG',
                      'name_ar'  => 'الجنية المصرى',
                      'name_en'  => 'Egyption Pound'
                    ],
                    [
                      'currency' => 'MRU',
                      'name_ar'  => 'الأوقية الموريتانية',
                      'name_en'  => 'Mauritanian ouguiya'
                    ],
                    [
                      'currency' => 'EUR',
                      'name_ar'  => 'اليورو الأوروبي',
                      'name_en'  => 'European Union'
                    ]
                ])
            ],
            [
                'name' => 'app_Currency',
                'value'=> 'USD'
            ],
            [
                'name' => 'whatsapp_number',
                'value' => '201026051966'
            ]
        ];

        // insert data from here
        Setting::insert($setting);
    }
}
