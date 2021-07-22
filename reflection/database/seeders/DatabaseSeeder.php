<?php

namespace Database\Seeders;

use App\Models\companies;
use App\Models\employees;
use App\Models\images;
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
        $this->call(userstableseeder::class);
        // \App\Models\User::factory(10)->create();
        $companies = companies::factory(30)->create();

        foreach($companies as $company){
            // images::factory(1)->create([
            //     'foreign-id'=> $company->id
            // ]);
            employees::factory(50)->create([
                'foreign_id' => $company->id,
                'companyName' => $company->Name 
            ]);
        }
    }
}
