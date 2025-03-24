<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangaysTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('barangays')->insert([
            ['name' => 'Apokon'],
            ['name' => 'Bincungan'],
            ['name' => 'Busaon'],
            ['name' => 'Canocotan'],
            ['name' => 'Cuambogan'],
            ['name' => 'La Filipina'],
            ['name' => 'Liboganon'],
            ['name' => 'Madaum'],
            ['name' => 'Magdum'],
            ['name' => 'Mankilam'],
            ['name' => 'New Balamban'],
            ['name' => 'Nueva Fuerza'],
            ['name' => 'Pagsabangan'],
            ['name' => 'Pandapan'],
            ['name' => 'Magugpo Poblacion'],
            ['name' => 'San Agustin'],
            ['name' => 'San Isidro'],
            ['name' => 'San Miguel (Camp 4)'],
            ['name' => 'Visayan Village'],
            ['name' => 'Magugpo East'],
            ['name' => 'Magugpo North'],
            ['name' => 'Magugpo South'],
            ['name' => 'Magugpo West']
        ]);
    }
}
