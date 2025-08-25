<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name',       'value' => 'Satan.az',                    'extra' => '',               'type' => 'about'],
            ['key' => 'logo',            'value' => 'logo.png',                    'extra' => '',               'type' => 'about'],
            ['key' => 'favicon',         'value' => 'favicon.png',                 'extra' => '',               'type' => 'about'],
            ['key' => 'facebook_url',    'value' => 'https://facebook.com/satan',  'extra' => 'fa-facebook-f',  'type' => 'social'],
            ['key' => 'instagram_url',   'value' => 'https://instagram.com/satan', 'extra' => 'fa-instagram',   'type' => 'social'],  
            ['key' => 'phone',           'value' => '+99455 821 56 73',            'extra' => '',               'type' => 'contact'],
            ['key' => 'address',         'value' => 'Bakı, Azərbaycan',            'extra' => '',               'type' => 'contact'],
            ['key' => 'primary_color',   'value' => '#6bbe66',                     'extra' => '',               'type' => 'color'],
            ['key' => 'secondary_color', 'value' => '#00a1f1',                     'extra' => '',               'type' => 'color'],
            ['key' => 'extra_color',     'value' => '#ff4141',                     'extra' => '',               'type' => 'color'],
            ['key' => 'email',           'value' => 'satanaz.official@gmail.com',  'extra' => '',               'type' => 'contact'],
            ['key' => 'about',           'value' => 'Satan.az layihəsi Azərbaycanda özəl elanlar üçün universal meydança təşkil etmək məqsədi ilə yaradılıb. Hər bir kəs saytdan istifadə etməklə geyim və mebeldən tutmuş elektronika və avtomobilədək hər şey ala və sata bilər. Satan.az-a əsasən ayrıca fərdlər elan yerləşdirir, lakin sayt şirkət və fərdi sahibkarlar üçün də maraq kəsb edir, buna görə Satan.az-da təkcə işlənmiş deyil, eləcə də yeni məhsullar əldə etmək olar. ## Administrasiya Servisin inzibatçılığını Azərbaycan Respublikasının qanunvericiliyinə uyğun olaraq yaradılmış və qeydiyyatdan keçmiş “DİGİTAL CLASSİFİEDS MMC” Şirkəti (VÖEN: 1405631661) həyata keçirir. Servisə dair bütün mülkiyyət hüquqları müstəsna olaraq Şirkətə aiddir.',    'extra' => '', 'type' => 'about'],
        ];

        foreach ($settings as $setting) {
            DB::table('configs')->updateOrInsert(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'extra' => $setting['extra'],
                    'type' => $setting['type'],
                ]
            );
        }
    }
}
