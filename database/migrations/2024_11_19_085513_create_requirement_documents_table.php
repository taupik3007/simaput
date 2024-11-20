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
        Schema::create('requirement_documents', function (Blueprint $table) {
            $table->bigIncrements('rqd_id');
            $table->string('rqd_name');
            
            $table->timestamps();

            $table->renameColumn('updated_at', 'rqd_updated_at');
            $table->renameColumn('created_at', 'rqd_created_at');
            $table->unsignedBigInteger('rqd_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rqd_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rqd_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'rqd_deleted_at');
            $table->string('rqd_sys_note')->nullable();


            $table->foreign('rqd_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rqd_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rqd_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_documents');
    }
};
