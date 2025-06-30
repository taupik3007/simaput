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
    Schema::create('teaching_assignments', function (Blueprint $table) {
    $table->bigIncrements('teach_id');

    $table->unsignedBigInteger('teach_teacher_id');
    $table->unsignedBigInteger('teach_subject_id');
    $table->unsignedBigInteger('teach_class_id');

    $table->timestamps();
    $table->renameColumn('created_at', 'teach_created_at');
    $table->renameColumn('updated_at', 'teach_updated_at');

    $table->unsignedBigInteger('teach_created_by')->nullable();
    $table->unsignedBigInteger('teach_updated_by')->nullable();
    $table->unsignedBigInteger('teach_deleted_by')->nullable();

    $table->softDeletes();
    $table->renameColumn('deleted_at', 'teach_deleted_at');

    $table->string('teach_sys_note')->nullable();

    $table->foreign('teach_teacher_id')->references('usr_id')->on('users')->onDelete('cascade');
    $table->foreign('teach_subject_id')->references('subj_id')->on('subjects')->onDelete('cascade');
    $table->foreign('teach_class_id')->references('cls_id')->on('classes')->onDelete('cascade');

    $table->foreign('teach_created_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('teach_updated_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('teach_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_assigments');
    }
};
