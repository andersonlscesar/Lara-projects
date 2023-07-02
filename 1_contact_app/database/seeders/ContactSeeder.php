<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $contacts = [];

        foreach(range(1, 300) as $index) {
            $contact = [
                'first_name'    => $faker->firstName(),
                'last_name'     => $faker->lastName(),
                'email'         => $faker->email(),
                'phone'         => $faker->phoneNumber(),
                'address'       => $faker->address(),
                'created_at'    => now(),
                'updated_at'    => now(),
                'company_id'    => rand(1, 20)
            ];

            $contacts[] = $contact;
        }  
        
        Contact::insert($contacts);
    }
}
