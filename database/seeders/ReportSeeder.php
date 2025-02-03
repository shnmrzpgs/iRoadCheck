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
                'date' => '2024-10-10',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/pothole.png',
                'lat' => 7.4551,
                'lng' => 125.8132,

            ],
            [
                'resident_id' => 2,
                'defect' => 'Pothole',
                'location' => 'Magugpo',
                'date' => '2024-10-10',
                'severity' => 3,
                'status' => 'Unfixed',
                'image' => 'images/pothole1.png',
                'lat' => 7.4000,
                'lng' => 125.8132,

            ],
        ]);
    }
}
