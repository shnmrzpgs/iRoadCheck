<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reports')->insert([
            [
                'resident_id' => 2,
                'defect' => 'Pothole',
                'location' => 'Apokon Road, Tagum City',
                'date' => '2025-03-10',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/pothole.png',
                'lat' => 7.4551,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 2,
                'defect' => 'Raveling',
                'location' => 'Magugpo South',
                'date' => '2025-07-10',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/pothole1.png',
                'lat' => 7.4000,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 1,
                'defect' => 'Cracks',
                'location' => 'Magugpo North',
                'date' => '2025-01-20',
                'severity' => 3,
                'status' => 'Ongoing',
                'image' => 'images/pothole1.png',
                'lat' => 7.4000,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 1,
                'defect' => 'Pothole',
                'location' => 'Apokon Road',
                'date' => '2025-03-25',
                'severity' => 3,
                'status' => 'Fixed',
                'image' => 'images/pothole.png',
                'lat' => 7.4551,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 2,
                'defect' => 'Pothole',
                'location' => 'Apokon Road',
                'date' => '2025-06-25',
                'severity' => 3,
                'status' => 'Ongoing',
                'image' => 'images/pothole.png',
                'lat' => 7.4551,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 2,
                'defect' => 'Alligator Crack',
                'location' => 'Apokon Road',
                'date' => '2025-02-25',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/pothole.png',
                'lat' => 7.4551,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 1,
                'defect' => 'Raveling',
                'location' => 'Magugpo South',
                'date' => '2025-07-10',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/pothole1.png',
                'lat' => 7.4000,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 1,
                'defect' => 'Pothole',
                'location' => 'Apokon Road',
                'date' => '2022-03-25',
                'severity' => 3,
                'status' => 'Fixed',
                'image' => 'images/pothole.png',
                'lat' => 7.4551,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 1,
                'defect' => 'Raveling',
                'location' => 'Magugpo South',
                'date' => '2024-07-10',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/pothole1.png',
                'lat' => 7.4000,
                'lng' => 125.8132,

            ],
        ]);
    }
}
