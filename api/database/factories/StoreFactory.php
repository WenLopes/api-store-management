<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'fantasy_name' => $this->faker->company(),
            'document' => $this->removePunctuationFromCnpj($this->faker->unique()->cnpj),
            'address' => $this->faker->address,
            'logo' => null,
            'active' => true
        ];
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [];
        });
    }

    /**
     * Remove all punctuation from cnpj string
     * @param string $cnpj
     * @return string
     */
    private function removePunctuationFromCnpj(string $cnpj) : string
    {
        $cnpj = str_replace(".", "", $cnpj);
        $cnpj = str_replace("/", "", $cnpj);
        $cnpj = str_replace("-", "", $cnpj);
        return $cnpj;
    }
}
