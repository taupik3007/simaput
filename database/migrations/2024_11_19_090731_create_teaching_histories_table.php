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
        Schema::create('teaching_histories', function (Blueprint $table) {
            $table->bigIncrements('tch_id');
            $table->unsignedBiginteger('tch_user_id');
            $table->string('tch_subject');
            $table->string('tch_school_name');
            $table->bigInteger('tch_lesson_hours');
            $table->timestamp('tch_start_date');
            $table->timestamp('tch_end_date');
            $table->timestamp('tch_status');
            $table->timestamps();

            $table->renameColumn('updated_at', 'tch_updated_at');
            $table->renameColumn('created_at', 'tch_created_at');
            $table->unsignedBigInteger('tch_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('tch_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('tch_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'tch_deleted_at');
            $table->string('tch_sys_note')->nullable();


            $table->foreign('tch_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tch_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_histories');
    }
};
