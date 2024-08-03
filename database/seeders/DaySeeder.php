<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $daysOfWeek = [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];

        $times = [
            '12:00:00', // 12:00 PM
            '13:00:00', // 1:00 PM
            '14:00:00', // 2:00 PM
            '15:00:00', // 3:00 PM
            '16:00:00', // 4:00 PM
            '17:00:00', // 5:00 PM
            '18:00:00', // 6:00 PM
        ];

        foreach ($daysOfWeek as $day) {
            foreach ($times as $time) {
                Day::create([
                    'name' => $day,
                    'time' => $time,
                ]);
            }
        }
    }
}
