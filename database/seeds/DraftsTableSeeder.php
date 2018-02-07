<?php

use Illuminate\Database\Seeder;

class DraftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Draft::class, 50)->create();
    }
}
