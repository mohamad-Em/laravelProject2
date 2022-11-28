<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments(column:'employeeID');
            $table->string(column:'employeeName');
            $table->string(column:'employeeEmail');
            $table->string(column:'employeePassword');
            $table->string(column:'employeePhone');
            $table->string(column:'employeeAddress');
            $table->tinyInteger(column:'employeeStats');
            $table->foreignId(column:'sectionID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
