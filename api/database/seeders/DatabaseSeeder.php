<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->runStoreSeeder();

        $this->runEmployeeSeeder();
    }

    /**
     * Run Store seeder
     * @return void
     */
    public function runStoreSeeder() : void
    {
        \App\Models\Store::create([
            'store_id' => 1,
            'name' => 'API Store Default Company LTDA.',
            'fantasy_name' => 'API Company',
            'document' => '05067786000188',
            'address' => null,
            'logo' => null,
            'active' => true
        ]);
        // Cnpj ficcticio gerado a partir da plataforma 4DEVs: https://www.4devs.com.br/gerador_de_cnpj

        \App\Models\Store::factory(3)->create();
    }

    /**
     * Run Employee seeder
     * @return void
     */
    private function runEmployeeSeeder() : void
    {
        \App\Models\Employee::create([
            'store_id' => 1,
            'email' => config('env.API_USER_EMAIL'),
            'password' => bcrypt(config('env.API_USER_PASSWORD')),
            'name' => 'Api default user',
            'phone' =>  '11999999999',
            'admin' => true,
            'document' => '27223882000',
            'active' => true
        ]);
        // CPF ficcticio gerado a partir da plataforma 4DEVs: https://www.4devs.com.br/gerador_de_cnpj

        \App\Models\Employee::factory(3)->create();
    }
}
