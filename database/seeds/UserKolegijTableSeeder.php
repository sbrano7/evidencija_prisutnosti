<?php

use Illuminate\Database\Seeder;

class UserKolegijTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('users')->insert([
            'id'=>'1',
            'name' => 'prof.Testni',
            'email' => 'test@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'type'  => 'profesor'
            ]);


        for ($i = 0; $i < 3; $i++) {
            $kolegij = factory(App\Kolegij::class)->create();
            
            DB::table('user_kolegij')->insert([
                'user_id' => '1',
                'kolegij_id' => $kolegij->id
            ]);

            for ($j = 0; $j < 4; $j++) {
                $user = factory(App\User::class)->create();

            DB::table('user_kolegij')->insert([
                'user_id' => $user->id,
                'kolegij_id' => $kolegij->id
            ]);
            }
        }

    }
}
