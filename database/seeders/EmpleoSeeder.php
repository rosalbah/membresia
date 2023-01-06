<?php

namespace Database\Seeders;

use App\Models\Empleo;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleos = Empleo::factory(100)->create();

        foreach ($empleos as $empleo) {
            Image::factory(1)->create([
                'imageable_id' => $empleo->id,
                'imageable_type' => Empleo::class,
            ]);
            
            $empleo->modos()->attach([
                rand(1, 2),
                rand(3, 4),
            ]);
        }
    }
}
