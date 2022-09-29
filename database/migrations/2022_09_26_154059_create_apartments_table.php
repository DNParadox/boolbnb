<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->unsignedTinyInteger('bathroom');
            $table->unsignedTinyInteger('bed_number');
            $table->text('description')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 9);
            $table->float('price', 7, 2)->nullable();
            $table->text('photo');
            $table->unsignedTinyInteger('room_number');
            $table->unsignedSmallInteger('square_meters');
            $table->char('title',255);
            $table->boolean('visibility')->nullable();
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
        Schema::dropIfExists('apartments');
    }
}
