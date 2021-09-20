<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
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
        $companies = Company::factory(30)->create();

        foreach($companies as $company){
            // images::factory(1)->create([
            //     'foreign-id'=> $company->id
            // ]);
            Employee::factory(50)->create([
                'company_id' => $company->id,
                'company_name' => $company->name 
            ]);
        }
    }
}
