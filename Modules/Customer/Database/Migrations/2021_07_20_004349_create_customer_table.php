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
    final public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('gender');
            $table->string('document', 11)->unique();
            $table->integer('document_secondary')->unique();
            $table->string('document_secondary_complement');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->tinyInteger('civil_status');
            $table->string('cover')->nullable();
            $table->string('occupation');
            $table->integer('income');
            $table->string('telephone')->unique();
            $table->string('cell')->unique();
            $table->boolean('lessor')->nullable();
            $table->boolean('lessee')->nullable();

            $table->string('spouse_document', 11)->nullable();
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
    final public function down(): void
    {
        Schema::dropIfExists('customers');
    }
}
