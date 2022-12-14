<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        
        $user = User::factory()->create([
            'name' => 'The Administrator',
            'email' => 'support@administrator.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        
        // Listing::create([
        //     'title' => 'Web Designer',
        //     'tags' => 'laravel, designer',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email@me.com',
        //     'website' => 'www.website.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit quos alias dolorem id, maiores aperiam est, eaque voluptatem nihil porro optio magnam, explicabo quae eius! Consequatur, saepe odit delectus nostrum dolores itaque quaerat repellendus deserunt molestiae quia commodi iusto ipsam, adipisci debitis nesciunt. Eius id quisquam, temporibus repudiandae sint accusamus!'

        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
