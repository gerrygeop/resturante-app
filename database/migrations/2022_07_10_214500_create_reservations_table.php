<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('telp');
            $table->dateTime('reservation_date');
            $table->unsignedBigInteger('table_id');
            $table->integer('guest_number');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
