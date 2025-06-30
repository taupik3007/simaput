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
        Schema::create('subjects', function (Blueprint $table) {
    $table->bigIncrements('subj_id');
    $table->string('subj_code')->unique();
    $table->string('subj_name');
    $table->unsignedBigInteger('subj_major_id')->nullable();
    $table->string('subj_level')->nullable(); // X, XI, XII

    $table->timestamp('subj_created_at')->nullable();
    $table->timestamp('subj_updated_at')->nullable();
    $table->timestamp('subj_deleted_at')->nullable();
    $table->unsignedBigInteger('subj_created_by')->nullable();
    $table->unsignedBigInteger('subj_updated_by')->nullable();
    $table->unsignedBigInteger('subj_deleted_by')->nullable();
    $table->string('subj_sys_note')->nullable();

    $table->foreign('subj_major_id')->references('mjr_id')->on('majors')->onDelete('cascade');
    $table->foreign('subj_created_by')->references('usr_id')->on('users')->onDelete('cascade');
    $table->foreign('subj_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
    $table->foreign('subj_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
