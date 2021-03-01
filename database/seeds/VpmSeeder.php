<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Vpm;

class VpmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vpm::truncate();
        factory(Vpm::class,20)->create();
    }
}
