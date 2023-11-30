<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Concessionnaire::create(
            [
                'title' => 'Titre essai',
                'content' => 'Ceci est un essai d insertion par seeders'
                
            ]
        );
    }
}
