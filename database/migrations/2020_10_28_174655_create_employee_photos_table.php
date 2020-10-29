<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_photos', function (Blueprint $table) {
            $table->id();
            $table->string("photo_name");
            $table->string("description")->nullable();
            $table->boolean("profile")->nullable();
            $table->foreignId("employee_id")->constrained("employees");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_photos');
    }
}
