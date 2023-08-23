<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unique_id' => time() . '$' . $this->faker->unique()->safeEmail(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('12345678'),
            'iam' => $this->faker->randomElement(["Sugar Daddy", "Sugar Mommy", "Sugar Baby", "Sugar Daddy Mommy", "Sugar Baby (Hombre/Man)","Sugar Baby (Mujer/Women)","Sugar Baby (Trans)"]),
            'interestedin' => $this->faker->randomElement(["Sugar Daddy", "Sugar Mommy", "Sugar Baby", "Sugar Daddy Mommy", "Sugar Baby (Hombre/Man)","Sugar Baby (Mujer/Women)","Sugar Baby (Trans)"]),
            'financial_support' => $this->faker->randomElement([0, 1]),
            'email_verified_at' => now(),
            'dob' => $this->faker->date(),
            'age' => $this->faker->numberBetween(18, 70),
            'height' => $this->faker->numberBetween(150, 200),
            'weight' => $this->faker->numberBetween(40, 150),
            'body_type' => $this->faker->randomElement([0, 1, 2, 3]),
            'child' => $this->faker->randomElement([0, 1, 2, 3, 4, 5, 6, 7, 8]),
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zipcode' => $this->faker->postcode,
            'country' => $this->faker->country,
            'address' => $this->faker->address,
            'timezone' => $this->faker->timezone,
            'gender' => $this->faker->randomElement([0, 1, 2]),
            'about_me' => $this->faker->paragraph,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'last_login' => now(),
            'membership_type' => 0,
            'membership_price' => 'Free',
            'membership_start' => now(),
            'membership_status' => 0,
            'marital_status' => $this->faker->randomElement([0, 1]),
            'privacy_status' => $this->faker->randomElement([0, 1]),
            'status' => 1,
            'verify_status' => 1,
            'show_last_login' => $this->faker->randomElement([0, 1]),
            'block_male_msg' => $this->faker->randomElement([0, 1]),
            'block_female_msg' => $this->faker->randomElement([0, 1]),
            'block_trans_msg' => $this->faker->randomElement([0, 1]),
            'block_all_email' => $this->faker->randomElement([0, 1]),
            'block_money_making_opp_email' => $this->faker->randomElement([0, 1]),
            'block_local_event_meet_up_email' => $this->faker->randomElement([0, 1]),
            'block_like_favorite_email' => $this->faker->randomElement([0, 1]),
        ];
    }
}
