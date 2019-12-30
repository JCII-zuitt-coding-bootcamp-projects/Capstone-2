<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookables', function (Blueprint $table) {
            $table->bigIncrements('id');

            //the one who create
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');

            // the business owner
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('businesses');

            // the used template
            $table->unsignedBigInteger('bookable_template_id');
            $table->foreign('bookable_template_id')->references('id')->on('bookable_templates');

            $table->string('name',100);
            $table->string('image',100)->nullable(); // image filename

            $table->text('description');

            $table->dateTime('start_at');
            $table->dateTime('end_at');

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
        Schema::dropIfExists('bookables');
    }
}
