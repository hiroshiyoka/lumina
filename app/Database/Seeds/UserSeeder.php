<?php
    namespace App\Database\Seeds;

    class UserSeeder extends \CodeIgniter\Database\Seeder {
        public function run()
        {
            $faker = \Faker\Factory::create();

            for($i = 0; $i < 500; $i++) {
                $data = [
                    'username' => $faker -> username,
                    'password' => $faker -> password,
                    'salt' => $faker -> password,
                    'avatar' => NULL,
                    'role' => 1,
                    'created_by' => 0,
                    'created_date' => date("Y-m-d H:i:s"),
                ];
    
                $this -> db -> table('users') -> insert($data);
            }
        }
    }