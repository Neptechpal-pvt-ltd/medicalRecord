<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // \App\Models\User::factory(10)->create();
        $countries = base_path().'/public/sql/countries.sql';
        $countriesql = file_get_contents($countries);
        DB::unprepared($countriesql);

        $provinces = base_path().'/public/sql/provinces_updated.sql';
        $provinceSql = file_get_contents($provinces);
        DB::unprepared($provinceSql);

        $districts = base_path().'/public/sql/districts.sql';
        $districtSql = file_get_contents($districts);
        DB::unprepared($districtSql);

        $municipals = base_path().'/public/sql/municipals.sql';
        $municipalSql = file_get_contents($municipals);
        DB::unprepared($municipalSql);
    }
}
