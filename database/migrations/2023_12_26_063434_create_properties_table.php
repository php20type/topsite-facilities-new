<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Property name
            $table->unsignedBigInteger('property_type_id'); // Property name
            $table->text('address1')->nullable(); // Property description (nullable)
            $table->text('address2')->nullable(); // Property description (nullable)
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->boolean('parking')->nullable();
            $table->integer('area')->nullable();
            $table->timestamps();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
