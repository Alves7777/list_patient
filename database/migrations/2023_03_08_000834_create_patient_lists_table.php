<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientListsTable extends Migration
{
    public function up()
    {
        Schema::create('patient_lists', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('patient_name');
            $table->string('mother_name');
            $table->string('date_birth');
            $table->string('cpf');
            $table->string('cns');
            $table->string('zipcode');
            $table->string('address');
            $table->string('number');
            $table->string('supplement')->nullable();
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('patient_lists');
    }
}
