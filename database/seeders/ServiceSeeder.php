<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Day;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Truncate the services table if necessary
        // DB::table('services')->truncate(); // Comment this if you're encountering foreign key issues

        // Insert services
        DB::table('services')->insert([
            [
                'name' => 'Baard',
                'price' => 15.00,
                'currency' => '€',
                'min_price' => 15.00,
                'max_price' => null,
                'image' => 'assets/images/Baraad.jpg'
            ],
            [
                'name' => 'Fade haarsnit',
                'price' => 25.00,
                'currency' => '€',
                'min_price' => 25.00,
                'max_price' => null,
                'image' => 'assets/images/fade.jpg'
            ],
            [
                'name' => 'Klassieke haarsnit',
                'price' => 20.00,
                'currency' => '€',
                'min_price' => 20.00,
                'max_price' => null,
                'image' => 'assets/images/Klassiek.jpg'
            ],
            [
                'name' => 'Broske',
                'price' => 15.00,
                'currency' => '€',
                'min_price' => 15.00,
                'max_price' => null,
                'image' => 'assets/images/broske.jpg'
            ],
            [
                'name' => 'Kinderen',
                'price' => 15.00,
                'currency' => '€',
                'min_price' => 15.00,
                'max_price' => null,
                'image' => 'assets/images/kinder.jpg'
            ],
            [
                'name' => 'Haar en baard',
                'price' => 32.00, // Use a base price
                'currency' => '€',
                'min_price' => 32.00,
                'max_price' => 35.00,
                'image' => 'assets/images/haar.jpg'
            ],
        ]);

        // Fetch all services
        $services = Service::all();

        // Fetch all day IDs
        $days = Day::all()->pluck('id')->toArray();

        // Attach all days to each service
        foreach ($services as $service) {
            $service->days()->sync($days);
        }
    }
}
