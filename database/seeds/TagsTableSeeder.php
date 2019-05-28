<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'code' => Str::random(10),
            'name' => Str::random(10),
        ]);

        $users = factory(App\Tag::class, 10)
           ->create();
    }
}
