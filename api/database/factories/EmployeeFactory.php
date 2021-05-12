<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $stores = Store::where('store_id', '<>', 1)->pluck('store_id')->toArray();

        return [
            'store_id' => $this->faker->randomElement($stores),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'name' => $this->faker->name(),
            'phone' =>  $this->faker->phoneNumberCleared,
            'admin' => $this->faker->boolean(20),
            'document' => $this->removePunctuationFromCpf($this->faker->unique()->cpf),
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
    private function removePunctuationFromCpf(string $cpf) : string
    {
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("/", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        return $cpf;
    }
}
