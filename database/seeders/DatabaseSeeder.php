<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Modo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // borrado y creación del directorio storage/app/public/empleos
        Storage::deleteDirectory('empleos');
        Storage::makeDirectory('empleos');

        $this->call(RoleSeeder::class);

        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Modo::factory(4)->create();
        $this->call(EmpleoSeeder::class);
    }
}
