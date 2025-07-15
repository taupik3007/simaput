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
    Schema::create('semesters', function (Blueprint $table) {
        $table->bigIncrements('smt_id');

        $table->unsignedBigInteger('smt_academic_year_id'); // FK ke academic_years

        $table->string('smt_name'); // "Ganjil" / "Genap"
        $table->tinyInteger('smt_report_status')->default(0);
        

        $table->tinyInteger('smt_status')->default(0); // 0 = nonaktif, 1 = aktif
        // $table->tinyInteger('smt_report_')->default(0); // 0 = nonaktif, 1 = aktif

        $table->timestamps();
        $table->renameColumn('created_at', 'smt_created_at');
        $table->renameColumn('updated_at', 'smt_updated_at');

        $table->foreign('smt_academic_year_id')->references('acy_id')->on('academic_years')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};
