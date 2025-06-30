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
        Schema::create('schedule_slots', function (Blueprint $table) {
    $table->bigIncrements('schs_id');
    $table->string('schs_day');
    $table->integer('schs_order'); // jam ke berapa
    $table->time('schs_start_time');
    $table->time('schs_end_time');

    $table->timestamps();
    $table->renameColumn('created_at', 'schs_created_at');
    $table->renameColumn('updated_at', 'schs_updated_at');

    $table->unsignedBigInteger('schs_created_by')->nullable();
    $table->unsignedBigInteger('schs_updated_by')->nullable();
    $table->unsignedBigInteger('schs_deleted_by')->nullable();
    $table->softDeletes();
    $table->renameColumn('deleted_at', 'schs_deleted_at');
    $table->string('schs_sys_note')->nullable();

    $table->foreign('schs_created_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('schs_updated_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('schs_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_slots');
    }
};
