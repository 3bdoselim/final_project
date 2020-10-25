<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId("branch_section_name")->constrained("sections");
            $table->integer("branch_section_max_capicaty");
            $table->integer("branch_section_in_stock");
            $table->foreignId("branch_id")->constrained("branches");
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
        Schema::dropIfExists('branch_sections');
    }
}
