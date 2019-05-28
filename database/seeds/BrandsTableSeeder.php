<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'code' => Str::random(10),
            'name' => Str::random(10),
        ]);

        $users = factory(App\Brand::class, 10)
           ->create();
    }
}
