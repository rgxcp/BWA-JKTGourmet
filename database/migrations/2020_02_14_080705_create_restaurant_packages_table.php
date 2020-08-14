<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('reservation_date');
            $table->integer('price');
            $table->longText('about');
            $table->string('location');
            $table->string('reservation');
            $table->string('restaurant_type');
            $table->string('slug');
            $table->string('title');
            $table->softDeletes();
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
        Schema::dropIfExists('restaurant_packages');
    }
}
