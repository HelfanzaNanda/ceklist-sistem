<?php

use App\Schedulle;
use Illuminate\Database\Seeder;

class SchedulleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedulle::create([
            'day' => 'Senin',
            'name_ob' => 'OfficeBoy1',
            'working_hour' => '07.00 WIB',
            'break' => '11.30 WIB',
            'home_hour' => '17.00 WIB',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedulle::create([
            'day' => 'Senin',
            'name_ob' => 'OfficeBoy2',
            'working_hour' => '08.00 WIB',
            'break' => '11.30 WIB',
            'home_hour' => '17.00 WIB',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Schedulle::create([
            'day' => 'Selasa',
            'name_ob' => 'OfficeBoy2',
            'working_hour' => '07.00 WIB',
            'break' => '11.30 WIB',
            'home_hour' => '17.00 WIB',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedulle::create([
            'day' => 'Selasa',
            'name_ob' => 'OfficeBoy1',
            'working_hour' => '08.00 WIB',
            'break' => '11.30 WIB',
            'home_hour' => '17.00 WIB',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
