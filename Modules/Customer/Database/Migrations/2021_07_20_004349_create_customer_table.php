<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->tinyInteger('gender');
            $table->string('document')->unique();
            $table->integer('document_secondary')->unique();
            $table->string('document_secondary_complement');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->tinyInteger('civil_status');
            $table->string('cover')->nullable();
            $table->string('occupation');
            $table->decimal('income', '11', '2');
            $table->string('telephone')->unique();
            $table->string('cell')->unique();
            $table->boolean('lessor')->nullable();
            $table->boolean('lessee')->nullable();

            $table->integer('spouse_document')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->double('spouse_income', 11, 2)->nullable();
            $table->tinyInteger('type_of_communion')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
