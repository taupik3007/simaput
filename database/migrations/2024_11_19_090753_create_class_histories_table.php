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
        Schema::create('class_histories', function (Blueprint $table) {
            $table->bigIncrements('clh_id');
            $table->unsignedBigInteger('clh_teaching_history_id');
            $table->bigInteger('clh_class_level');
            $table->timestamps();
            $table->renameColumn('updated_at', 'clh_updated_at');
            $table->renameColumn('created_at', 'clh_created_at');
            $table->unsignedBigInteger('clh_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('clh_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('clh_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'clh_deleted_at');
            $table->string('clh_sys_note')->nullable();


            $table->foreign('clh_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('clh_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('clh_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('clh_teaching_history_id')->references('tch_id')->on('teaching_histories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_histories');
    }
};
