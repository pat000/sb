<?php

use Illuminate\Database\Seeder;

class OrdinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordinance = factory(App\Ordinance::class, 500)->create();

    }
}
