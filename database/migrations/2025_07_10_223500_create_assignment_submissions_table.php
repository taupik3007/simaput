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
        Schema::create('assignment_submissions', function (Blueprint $table) {
        $table->bigIncrements('asb_id');

        $table->unsignedBigInteger('asb_assignment_id'); // foreign ke assignments
        $table->unsignedBigInteger('asb_student_id'); // foreign ke users

        $table->dateTime('asb_submitted_at')->nullable();
        $table->string('asb_file')->nullable();
        $table->text('asb_note')->nullable();
        $table->integer('asb_score')->nullable();
        $table->text('asb_feedback')->nullable();

        $table->timestamps();
        $table->renameColumn('created_at', 'asb_created_at');
        $table->renameColumn('updated_at', 'asb_updated_at');

        $table->unsignedBigInteger('asb_created_by')->nullable();
        $table->unsignedBigInteger('asb_updated_by')->nullable();
        $table->unsignedBigInteger('asb_deleted_by')->nullable();

        $table->softDeletes();
        $table->renameColumn('deleted_at', 'asb_deleted_at');

        $table->string('asb_sys_note')->nullable();

        // Relasi
        $table->foreign('asb_assignment_id')->references('asg_id')->on('assignments')->onDelete('cascade');
        $table->foreign('asb_student_id')->references('usr_id')->on('users')->onDelete('cascade');

        $table->foreign('asb_created_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('asb_updated_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('asb_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};
