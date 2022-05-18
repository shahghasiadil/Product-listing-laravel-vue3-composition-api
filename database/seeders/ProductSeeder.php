<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Author::create([
            'name' => "Sayed"
        ]);

        $khan = Author::create([
            'name' => "Khan"
        ]);

        Product::create([
            'name' => "I Phone",
            'details' => 'World no 1',
            'author_id'=> $author->id
        ]);


        Product::create([
            'name' => "PC",
            'details' => 'Dell',
            'author_id'=> $author->id
        ]);

        Product::create([
            'name' => "Printer",
            'details' => 'World no 1',
            'author_id'=> $khan->id
        ]);

    }
}
