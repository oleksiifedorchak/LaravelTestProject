<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->delete();

        $countries_json = Http::get('https://restcountries.com/v2/all')->json();

        foreach ($countries_json as $country) {
            DB::table('country')->insert([
                'name' => $country['name']
            ]);
        }
    }
}
