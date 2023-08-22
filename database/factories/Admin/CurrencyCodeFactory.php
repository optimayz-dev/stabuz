<?php

namespace Database\Factories\Admin;

use App\Models\Admin\CurrencyCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends Factory<CurrencyCode>
 */
class CurrencyCodeFactory extends Factory
{
    protected $model = CurrencyCode::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $currencyCodes = ['USD', 'RUB', 'SUM'];
        $code = $this->faker->unique()->randomElement($currencyCodes);

        return [
            'currency_code' => $code,
        ];
    }
}
