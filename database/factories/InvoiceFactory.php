<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
{
        /**
         * 
         * 
         * @var string
         * 
         */
        protected $model = Invoice::class;

        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
                $status_options = ['B', 'P', 'V'];
                $status = array_rand($status_options);

                return [
                        'customer_id' => Customer::factory(),
                        'amount' => fake()->numberBetween(100, 20000),
                        'status' => $status_options[$status],
                        'billed_dated' => fake()->dateTimeThisDecade(),
                        'paid_dated' => $status_options[$status] == 'P' ? fake()->dateTimeThisDecade() : NULL
                ];
        }
}
