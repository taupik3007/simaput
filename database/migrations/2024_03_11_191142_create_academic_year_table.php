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
        Schema::create('academic_years', function (Blueprint $table) {
            $table->bigIncrements('acy_id');
            $table->unsignedBiginteger('acy_starting_year');
            $table->unsignedBigInteger('acy_year_over');
            $table->unsignedBigInteger('acy_status')->default(2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_year');
    }
};
