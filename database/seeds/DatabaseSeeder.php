<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         factory(App\Customer::class , 150)->create();
//        factory(App\Product::class , 150)->create();
    }
}
