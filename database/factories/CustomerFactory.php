<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
        /**
         * 
         * 
         * @var string
         * 
         */
        protected $model = Customer::class;

        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
                $type_options = ['I', 'B'];
                $type = array_rand($type_options);
                $name = $type == 'I' ? fake()->name() : fake()->company();

                return [
                        'name' => $name,
                        'type' => $type_options[$type],
                        'email' => fake()->email(),
                        'address' => fake()->streetAddress(),
                        'city' => fake()->city(),
                        'state' => fake()->state(),
                        'postal_code' => fake()->postCode()
                ];
        }
}
