<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //插入10条
        for($i=1;$i<=10;$i++){
            #实例化
            $faker = Faker\Factory::create();
            #组装数据
            $data[] = array(
                'username'=>$faker->userName,
                'password'=>bcrypt($faker->password),
                'itcode' => substr($faker->name(), 0, rand(4, 8)),
                'email' =>$faker->email,
                'created_at' => time(),
                'updated_at' => time()
            );
        }
        #插入
        DB::table('users')->insert($data);
    }
}
