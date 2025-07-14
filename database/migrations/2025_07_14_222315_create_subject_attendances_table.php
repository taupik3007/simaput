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
       Schema::create('subject_attendances', function (Blueprint $table) {
        $table->bigIncrements('satd_id');

        $table->unsignedBigInteger('satd_teaching_id');
        $table->date('satd_date')->nullable(); // bisa auto-fill kalau diisi manual
        $table->string('satd_topic')->nullable(); // topik pelajaran (opsional)

        $table->timestamps();
        $table->renameColumn('created_at', 'satd_created_at');
        $table->renameColumn('updated_at', 'satd_updated_at');

        $table->unsignedBigInteger('satd_created_by')->nullable();
        $table->unsignedBigInteger('satd_updated_by')->nullable();
        $table->unsignedBigInteger('satd_deleted_by')->nullable();

        $table->softDeletes();
        $table->renameColumn('deleted_at', 'satd_deleted_at');

        $table->foreign('satd_teaching_id')->references('teach_id')->on('teaching_assignments')->onDelete('cascade');
        $table->foreign('satd_created_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('satd_updated_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('satd_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_attendances');
    }
};
