<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $locals = (config('translatable.locales'));
        foreach ($locals as $locale) {

            if ($locale == 'fa') {
                $faker = \Faker\Factory::create('fa_IR');
            } elseif ($locale == 'en') {
                $faker = \Faker\Factory::create('en_US');
            }
            Setting::factory()->create([
                'lang' => $locale,
                'site_name' => $faker->title,
                'description' => $faker->text,
                'logo_url' => 'assets/image/logo.png',
                'breaking_title_category' => 1,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'about' => $faker->text
            ]);
        }

    }
}
