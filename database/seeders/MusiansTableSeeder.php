<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MusiansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i <5 ; $i++) { 
            DB::table('musians')->insert([
               'name'=>$faker->name,
               'profile_picture'=>'',
               'birth_date'=>$faker->date($format = 'Y-m-d', $max = '1995-01-01'),
               'instrument'=>$faker->randomElement(['cheo','hai','cai luong','hat','khoc']),
               'biography'=>$faker->paragraph,
               'created_at'=>Carbon::now(),
               'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
