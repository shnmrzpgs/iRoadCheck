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
                'reporter_id' => 2,
                'defect' => 'Pothole',
                'location' => 'Apokon Road, Purok 1, Apokon, Tagum City',
                'street' => 'Apokon Road',
                'purok' => 'Purok 1',
                'barangay' => 'Apokon',
                'date' => '2025-03-10',
                'severity' => 3,
                'status' => 'Ongoing',
                'image' => 'images/roadDefect-patches.jpg',
                'lat' => 7.4238,
                'lng' => 125.8260,
            ],
            [
                'reporter_id' => 2,
                'defect' => 'Raveling',
                'location' => 'Magugpo South, Purok 3, Magugpo South, Tagum City',
                'street' => 'Magugpo South',
                'purok' => 'Purok 3',
                'barangay' => 'Magugpo South',
                'date' => '2025-07-10',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/roadDefect-patches.jpg',
                'lat' => 7.4473,
                'lng' => 125.7950,
            ],
            [
                'reporter_id' => 3,
                'defect' => 'Cracks',
                'location' => 'Rizal Street, Purok 5, Magugpo North, Tagum City',
                'street' => 'Rizal Street',
                'purok' => 'Purok 5',
                'barangay' => 'Magugpo North',
                'date' => '2025-01-20',
                'severity' => 3,
                'status' => 'Ongoing',
                'image' => 'images/roadDefect-patches.jpg',
                'lat' => 7.4512,
                'lng' => 125.8133,
            ],
            [
                'reporter_id' => 6,
                'defect' => 'Pothole',
                'location' => 'Pioneer Avenue, Purok 2, Magugpo West, Tagum City',
                'street' => 'Pioneer Avenue',
                'purok' => 'Purok 2',
                'barangay' => 'Magugpo West',
                'date' => '2025-03-25',
                'severity' => 3,
                'status' => 'Repaired',
                'image' => 'images/roadDefect-pothole.jpg',
                'lat' => 7.4482,
                'lng' => 125.8074,
            ],
            [
                'reporter_id' => 10,
                'defect' => 'Pothole',
                'location' => 'Bonifacio Street, Purok 4, Magugpo East, Tagum City',
                'street' => 'Bonifacio Street',
                'purok' => 'Purok 4',
                'barangay' => 'Magugpo East',
                'date' => '2025-06-25',
                'severity' => 3,
                'status' => 'Ongoing',
                'image' => 'images/roadDefect-pothole.jpg',
                'lat' => 7.4510,
                'lng' => 125.8150,
            ],
            [
                'reporter_id' => 3,
                'defect' => 'Alligator Crack',
                'location' => 'Mabini Street, Purok 6, Magugpo North, Tagum City',
                'street' => 'Mabini Street',
                'purok' => 'Purok 6',
                'barangay' => 'Magugpo North',
                'date' => '2025-02-25',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/roadDefect-pothole.jpg',
                'lat' => 7.4500,
                'lng' => 125.8100,
            ],
            [
                'reporter_id' => 21,
                'defect' => 'Alligator Crack',
                'location' => 'Lapu-Lapu Street, Purok 9, Visayan Village, Tagum City',
                'street' => 'Lapu-Lapu Street',
                'purok' => 'Purok 9',
                'barangay' => 'Visayan Village',
                'date' => '2024-11-05',
                'severity' => 4,
                'status' => 'Unfixed',
                'image' => 'images/roadDefect-patches.jpg',
                'lat' => 7.4490,
                'lng' => 125.8090,
            ],
        ]);
    }
}
