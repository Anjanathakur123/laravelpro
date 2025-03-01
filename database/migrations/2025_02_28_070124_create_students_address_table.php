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
        Schema::create('students_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stu_id');
            $table->foreign('stu_id')->references('id')->on('students');
            $table->string('city');
            $table->string('state');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_address');
    }
};
