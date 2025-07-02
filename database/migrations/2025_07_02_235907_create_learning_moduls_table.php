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
         Schema::create('learning_modules', function (Blueprint $table) {
            $table->bigIncrements('mod_id');

            $table->unsignedBigInteger('mod_teaching_id'); // relasi ke teaching_assignments
            $table->string('mod_name');
            $table->string('mod_file');
            $table->date('mod_start_date');

            // Metadata
            $table->unsignedBigInteger('mod_created_by')->nullable();
            $table->unsignedBigInteger('mod_updated_by')->nullable();
            $table->unsignedBigInteger('mod_deleted_by')->nullable();
            $table->text('mod_sys_note')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Rename timestamp column
            $table->renameColumn('created_at', 'mod_created_at');
            $table->renameColumn('updated_at', 'mod_updated_at');
            $table->renameColumn('deleted_at', 'mod_deleted_at');

            // Foreign Keys
            $table->foreign('mod_teaching_id')->references('teach_id')->on('teaching_assignments')->onDelete('cascade');
            $table->foreign('mod_created_by')->references('usr_id')->on('users')->onDelete('set null');
            $table->foreign('mod_updated_by')->references('usr_id')->on('users')->onDelete('set null');
            $table->foreign('mod_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_moduls');
    }
};
