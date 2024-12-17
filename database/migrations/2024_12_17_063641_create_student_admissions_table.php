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
        Schema::create('student_admissions', function (Blueprint $table) {
            $table->bigIncrements('sta_id');
            $table->unsignedBiginteger('sta_year');
            $table->timestamp('sta_start');
            $table->timestamp('sta_ended');
            $table->timestamps();
            $table->renameColumn('updated_at', 'sta_updated_at');
            $table->renameColumn('created_at', 'sta_created_at');
            $table->unsignedBigInteger('sta_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sta_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sta_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'sta_deleted_at');
            $table->string('sta_sys_note')->nullable();
            $table->foreign('sta_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sta_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sta_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_admissions');
    }
};
