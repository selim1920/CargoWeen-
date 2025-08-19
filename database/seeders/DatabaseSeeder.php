<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' =>fake()->name,
            'prenom' =>fake()->firstName,
            'logo' => null,
            'nom_compagnie_aerienne' => null,
            'code_airport' => null,
            'code_LATA' => null,
            'adresse' =>fake()->address,
            'ville' =>fake()->city,
            'code_postal' =>fake()->postcode,
            'pays' =>fake()->country,
            'fonction' =>fake()->jobTitle,
            'email' =>fake()->unique()->safeEmail,
            'email_verified_at' => now(),
            'role' => 'transitaire',
            'telephone' =>fake()->phoneNumber,
            'numero_cass' =>"123-123456789",
            'password' => null,
            'confirm_password' => null,
            'status' => 'pending',
            'remember_token' => null,
        ]);
    }
}
