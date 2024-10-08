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
        Schema::create('date_barbers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('name')->nullable();
            $table->string('name_customer')->nullable();
            $table->integer('status');
            $table->string('month');
            $table->string('day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_barbers');
    }
};
