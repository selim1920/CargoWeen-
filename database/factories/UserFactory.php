<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'prenom' => $this->faker->firstName,
            'logo' => null,
            'nom_compagnie_aerienne' => null,
            'code_airport' => null,
            'code_LATA' => null,
            'adresse' => $this->faker->address,
            'ville' => $this->faker->city,
            'code_postal' => $this->faker->postcode,
            'pays' => $this->faker->country,
            'fonction' => $this->faker->jobTitle,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'role' => 'transitaire',
            'telephone' => null,
            'numero_cass' => null,
            'password' => null,
            'confirm_password' => null,
            'status' => 'pending',
            'remember_token' => null,
        ];
    }
}
