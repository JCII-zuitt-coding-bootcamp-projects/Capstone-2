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

            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('businesses');


            $table->longtext('children')->nullable(true);//->default("[]"); //array string
            $table->longtext('bookable')->nullable(true);//->default("{}"); //array string
            $table->unsignedSmallInteger('total_bookable')->default(0);
            
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
