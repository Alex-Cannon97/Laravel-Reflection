<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->unique();
            $table->string('email')->unique();
            $table->string('logo');
            $table->string('website');
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
        });
    }
//Companies Database table consists of these fields: Name (required), email, logo (minimum 100×100), website
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
