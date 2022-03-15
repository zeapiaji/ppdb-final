<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++)
        {
            DB::table('News')->insert([
                'title'     => $faker -> title,
                'content'   => $faker -> paragraph,
                'visitors'  => $faker -> numberBetween(100,200),
                'image'     => $faker -> email,
            ]);
        }
    }
}
