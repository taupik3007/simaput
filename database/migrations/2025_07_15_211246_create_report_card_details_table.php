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
    Schema::create('report_card_details', function (Blueprint $table) {
        $table->bigIncrements('rcd_id');

        $table->unsignedBigInteger('rcd_report_card_id');
        $table->unsignedBigInteger('rcd_teaching_id'); // diganti dari subject_id

        $table->float('rcd_score', 5, 2)->nullable();

        $table->string('rcd_grade', 2)->nullable();
        $table->text('rcd_description')->nullable();

        $table->timestamps();
        $table->renameColumn('created_at', 'rcd_created_at');
        $table->renameColumn('updated_at', 'rcd_updated_at');

        $table->unsignedBigInteger('rcd_created_by')->nullable();
        $table->unsignedBigInteger('rcd_updated_by')->nullable();
        $table->unsignedBigInteger('rcd_deleted_by')->nullable();

        $table->softDeletes();
        $table->renameColumn('deleted_at', 'rcd_deleted_at');

        $table->foreign('rcd_report_card_id')->references('rpc_id')->on('report_cards')->onDelete('cascade');
        $table->foreign('rcd_teaching_id')->references('teach_id')->on('teaching_assignments')->onDelete('cascade');

        $table->foreign('rcd_created_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('rcd_updated_by')->references('usr_id')->on('users')->onDelete('set null');
        $table->foreign('rcd_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_card_details');
    }
};
