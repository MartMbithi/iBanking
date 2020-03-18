<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('project_id')->unique();
            $table->string('project_name');
            $table->longText('project_desc');
            $table->string('project_files');
            $table->string('project_avatar');
            $table->string('project_category');
            $table->intenger('user_id');
            $table->string('user_email');
            $table->timestamp('date_created');
            $table->string('project_link');
            $table->string('project_number');
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
        Schema::dropIfExists('projects');
    }
}
