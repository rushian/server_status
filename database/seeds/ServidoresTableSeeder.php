<?php

use Illuminate\Database\Seeder;

class ServidoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('servidors')->insert([
			[
            'servidor'=>'STARTER',
            'ip' => '164.35.10.6',
            'status' => 0,
            'id_usuario'=> 1,
            'created_at'=> date("Y-m-d H:i:s"),
        	],
			[
            'servidor'=>'ROCK',
            'ip' => '164.35.10.3',
            'status' => 0,
            'id_usuario'=> 1,
            'created_at'=> date("Y-m-d H:i:s"),
        	],
			[
            'servidor'=>'WATER',
            'ip' => '164.35.10.7',
            'status' => 0,
            'id_usuario'=> 1,
            'created_at'=> date("Y-m-d H:i:s"),
        	]
        ]);
    }
}
