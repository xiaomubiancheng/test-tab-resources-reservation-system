<?php

use Illuminate\Database\Seeder;
use App\Http\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class,20)->create();

        User::where('id',1)->update(['username'=>'admin']);
    }
}
