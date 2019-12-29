<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookableTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookable_templates', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',100);
            $table->string('notes',200);
            $table->string('category',50);

            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');


            $table->text('children')->nullable()->default("[]"); //array string
            $table->text('bookable')->nullable()->default("{}"); //array string
            
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
        Schema::dropIfExists('bookable_templates');
    }
}
