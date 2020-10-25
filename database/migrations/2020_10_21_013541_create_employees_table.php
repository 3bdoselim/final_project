<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("employee_name");
            $table->string("employee_mobile",15);
            $table->date("employee_dob")->nullable();
            $table->date("employee_hire_date");
            $table->integer("employee_salary");
            $table->integer("employee_commission");
            $table->foreignId("manager_id")->nullable()->constrained("employees");
            $table->foreignId("job_id")->constrained("jobs");
            $table->foreignId("branch_id")->constrained("branches");
            $table->foreignId("user_id")->constrained("users");
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
        Schema::dropIfExists('employees');
    }
}
