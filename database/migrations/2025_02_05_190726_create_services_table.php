<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('car_id');
            $table->integer('lognumber');
            $table->string('event');
            $table->dateTime('eventtime')->nullable();
            $table->string('document_id');
            $table->timestamps();

            $table->unique(['client_id', 'car_id']);
            $table->unique(['client_id', 'car_id', 'lognumber']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
