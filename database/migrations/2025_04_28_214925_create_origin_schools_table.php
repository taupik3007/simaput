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
        Schema::create('origin_schools', function (Blueprint $table) {
            $table->bigIncrements('ors_id');
            $table->unsignedBiginteger('ors_user_id');
            $table->string('ors_school_name');
            $table->bigInteger('npsn');
            $table->string('un_participant_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_schools');
    }
};
