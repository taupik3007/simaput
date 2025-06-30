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
        Schema::create('schedules', function (Blueprint $table) {
    $table->bigIncrements('sch_id');

    $table->unsignedBigInteger('sch_teaching_id')->nullable();
    $table->unsignedBigInteger('sch_slot_id');

    $table->timestamps();
    $table->renameColumn('created_at', 'sch_created_at');
    $table->renameColumn('updated_at', 'sch_updated_at');

    $table->unsignedBigInteger('sch_created_by')->nullable();
    $table->unsignedBigInteger('sch_updated_by')->nullable();
    $table->unsignedBigInteger('sch_deleted_by')->nullable();

    $table->softDeletes();
    $table->renameColumn('deleted_at', 'sch_deleted_at');

    $table->string('sch_sys_note')->nullable();

    // Foreign Keys
    $table->foreign('sch_teaching_id')->references('teach_id')->on('teaching_assignments')->onDelete('cascade');
    $table->foreign('sch_slot_id')->references('schs_id')->on('schedule_slots')->onDelete('cascade');

    $table->foreign('sch_created_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('sch_updated_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('sch_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
