<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // the bookable id where reservation belongs, the bookabltemplate will get from it also
            $table->unsignedBigInteger('bookable_id');
            $table->foreign('bookable_id')->references('id')->on('bookables');

            //the one reserve if through admin...
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');

            //the one reserve if online reservation by a user
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('bookable_item_name',20); // seat code/number, table name/etc
            $table->string('cell_id',50); // or refer as cid in js code

            $table->unsignedSmallInteger('price')->default(0);


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
        Schema::dropIfExists('reservations');
    }
}
