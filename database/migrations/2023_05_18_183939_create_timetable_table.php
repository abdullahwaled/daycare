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
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('room');
            $table->string('teacher');
            $table->string('subject');
            $table->string('class');
            $table->string('group');
            $table->unsignedBigInteger('daycare_id');
             $table->foreign('daycare_id')->references('id')->on('daycares')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('timetable');
    }
};
