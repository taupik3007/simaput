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
    Schema::create('report_cards', function (Blueprint $table) {
        $table->bigIncrements('rpc_id');

        $table->unsignedBigInteger('rpc_student_id');
        $table->unsignedBigInteger('rpc_semester_id');

        $table->text('rpc_level'); // Catatan wali kelas

        $table->timestamps();
        $table->renameColumn('created_at', 'rpc_created_at');
        $table->renameColumn('updated_at', 'rpc_updated_at');

        $table->unsignedBigInteger('rpc_created_by')->nullable();
        $table->unsignedBigInteger('rpc_updated_by')->nullable();
        $table->unsignedBigInteger('rpc_deleted_by')->nullable();

        $table->softDeletes();
        $table->renameColumn('deleted_at', 'rpc_deleted_at');

        $table->foreign('rpc_student_id')->references('std_id')->on('students')->onDelete('cascade');
        $table->foreign('rpc_semester_id')->references('smt_id')->on('semesters')->onDelete('cascade');


        $table->foreign('rpc_created_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('rpc_updated_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('rpc_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_cards');
    }
};
