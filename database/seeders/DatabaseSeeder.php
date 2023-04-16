<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kategori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //     public function run()
    {
        \App\Models\User::factory(10)->create();
         \App\Models\User::factory()->create(
           [ 'name' => 'kuryu',
            'email' => 'unitedkuryu@gmail.com',
            'password' => bcrypt('123456789'),
            'created_at'=>now(),
            'role'=> 'admin'
         ]);
         $kategori = [
            [
               'kategori'=>'pembuka',
               'created_at'=>now()
            ],
            [
                'kategori'=>'utama',
                'created_at'=>now()
            ],
            [
                'kategori'=>'penutup',
                'created_at'=>now()
            ],
        ];
        foreach ($kategori as $user) {
            DB::table('kategoris')->insert($user);
        }
        $user=[
                ['name' => 'Nova',
                'email'=>'kulinerku@gmail.com',
                'password'=>bcrypt('semarmendem'),
                'role'=>'admin',
                'created_at'=>now(),
        ]
        ];
        foreach ($user as $user){
            DB::table('users')->insert($user);
        }
        $info=[
            ['kota' => 'malang',
            'email'=>'kulinerku@gmail.com',
            'no'=>'0987654321',
            'alamat'=>'Jl.Soekarno Hatta No.40, Malang, Jawa Timur',
            'created_at'=>now(),
    ]
    ];
    foreach ($info as $info){
        DB::table('infos')->insert($info);
    }
    }
}
}