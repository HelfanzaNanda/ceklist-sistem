<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            'Bersihkan Kamar Mandi',
            'Nyalakan Modem A/B',
            'Hidupkan AC Gedung Tengah dan Belakang',
            'Matikan Lampu Gedung Tengah dan Belakang',
            'Bersihkan Meja dan Laci Gedung Tengah dan Belakang',
            'Sapu dan Pel Lantai Gedung Tengah dan Belakang',
            'Bersihkan Dinding dan Langit-Langit Gedung Tengah dan Belakang',
            'Siram Tanaman Halaman Tengah',
            'Lap Basah Gazebo',
            'Sapu Area Gazebo'
        ];

        for ($i=0; $i < count($tasks); $i++) {
            if ($i <= 6) {
                Task::create([
                    'name' => $tasks[$i],
                    'role' => 'indoor'
                ]);
            }else{
                Task::create([
                    'name' => $tasks[$i],
                    'role' => 'outdoor'
                ]);
            }

        }
    }
}
