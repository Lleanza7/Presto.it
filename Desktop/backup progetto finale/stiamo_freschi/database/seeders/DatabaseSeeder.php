<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = ['Sport', 'Elettronica', 'Musica', 'Casa', 'Giardino', 'Fai da te', 'Abbigliamento', 'Accessori', 'Gioielli'];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // CREAZIONE 10 UTENTI
        User::factory(9)->create();

        // CREAZIONE CATEGORY PREIMPOSTATE
        foreach ($this->categories as $category) {
            Category::factory()->create([
                'name' => $category,
            ]);
        }

       // CREAZIONE 20 ANNOUNCEMENTS
        Announcement::factory(20)->create();
      
    }


    /*   return [
            
        'title' => $this->faker->sentence(4),
        'price' => $this->faker->randomFloat(2, 1, 9999),
        'description' => $this->faker->text(200),
        'category_id' => $this->faker->numberBetween(1, 9),
        'user_id' => $this->faker->numberBetween(1, 10),
    ]; */
}
