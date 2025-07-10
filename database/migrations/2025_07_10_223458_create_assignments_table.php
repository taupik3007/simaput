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
       Schema::create('assignments', function (Blueprint $table) {
        $table->bigIncrements('asg_id');

        $table->unsignedBigInteger('asg_teaching_id'); // foreign ke teaching_assignments

        $table->string('asg_title');
        $table->text('asg_description')->nullable();
        $table->string('asg_file')->nullable();
        $table->dateTime('asg_due_date');

        $table->timestamps();
        $table->renameColumn('created_at', 'asg_created_at');
        $table->renameColumn('updated_at', 'asg_updated_at');

        $table->unsignedBigInteger('asg_created_by')->nullable();
        $table->unsignedBigInteger('asg_updated_by')->nullable();
        $table->unsignedBigInteger('asg_deleted_by')->nullable();

        $table->softDeletes();
        $table->renameColumn('deleted_at', 'asg_deleted_at');

        $table->string('asg_sys_note')->nullable();

        // Relasi
        $table->foreign('asg_teaching_id')->references('teach_id')->on('teaching_assignments')->onDelete('cascade');

        $table->foreign('asg_created_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('asg_updated_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('asg_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
