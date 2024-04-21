<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Entities\Setting;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'company_name' => 'M5Pharmacy',
            'company_email' => 'm5pharmacy@hotmail.com',
            'company_phone' => '012345678901',
            'notification_email' => 'm5pharmacy@hotmail.com',
            'default_currency_id' => 1,
            'default_currency_position' => 'prefix',
            'footer_text' => 'M5 Pharmacy © 2023 || Developed by <strong><a target="_blank" href="#">Daitign</a></strong>',
            'company_address' => 'Panabo, Davao del Norte'
        ]);
    }
}
