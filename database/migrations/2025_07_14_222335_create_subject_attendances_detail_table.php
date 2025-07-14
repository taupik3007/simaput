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
        Schema::create('subject_attendance_details', function (Blueprint $table) {
        $table->bigIncrements('sadt_id');

        $table->unsignedBigInteger('sadt_attendance_id');
        $table->unsignedBigInteger('sadt_student_id');
        $table->tinyInteger('sadt_status'); // 1 = hadir, 2 = izin, 3 = sakit, 4 = alpa
        $table->text('sadt_note')->nullable();

        $table->timestamps();
        $table->renameColumn('created_at', 'sadt_created_at');
        $table->renameColumn('updated_at', 'sadt_updated_at');

        $table->unsignedBigInteger('sadt_created_by')->nullable();
        $table->unsignedBigInteger('sadt_updated_by')->nullable();
        $table->unsignedBigInteger('sadt_deleted_by')->nullable();

        $table->softDeletes();
        $table->renameColumn('deleted_at', 'sadt_deleted_at');

        $table->foreign('sadt_attendance_id')->references('satd_id')->on('subject_attendances')->onDelete('cascade');
        $table->foreign('sadt_student_id')->references('std_id')->on('students')->onDelete('cascade');

        $table->foreign('sadt_created_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('sadt_updated_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('sadt_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_attendances_detail');
    }
};
