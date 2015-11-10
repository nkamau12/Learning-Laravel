<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Groups', function (Blueprint $table) {
            $table->string('GID')->unique();
            $table->string('Fname');
            $table->string('Lname');
            $table->string('Agency');
            $table->string('Address');
            $table->integer('PhoneNo');
            $table->date('StartDate');
            $table->boolean('Clothing');
            $table->boolean('Furniture');
            $table->boolean('Other');
            $table->primary('GID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Groups');
    }
}
