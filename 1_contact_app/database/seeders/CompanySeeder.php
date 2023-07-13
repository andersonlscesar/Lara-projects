<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $companies = [];

        foreach(range(1,20) as $index) {
            $company = [
                'name'  => $faker->company(),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
            $companies[] = $company;
        }


        Company::insert($companies);
    }
}
