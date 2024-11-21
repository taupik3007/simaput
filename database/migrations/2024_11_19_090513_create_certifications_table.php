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
        Schema::create('certifications', function (Blueprint $table) {
            $table->bigIncrements('crf_id');
            $table->unsignedBigInteger('crf_user_id');
            $table->bigInteger('crf_implementation');
            $table->bigInteger('crf_year');
            $table->string('crf_certificate_number');
            $table->string('crf_major');
            $table->string('crf_organizer');
            $table->timestamps();

            $table->renameColumn('updated_at', 'crf_updated_at');
            $table->renameColumn('created_at', 'crf_created_at');
            $table->unsignedBigInteger('crf_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('crf_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('crf_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'crf_deleted_at');
            $table->string('crf_sys_note')->nullable();


            $table->foreign('crf_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('crf_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('crf_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('crf_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
