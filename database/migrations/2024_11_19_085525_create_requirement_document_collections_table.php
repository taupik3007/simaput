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
        Schema::create('requirement_document_collections', function (Blueprint $table) {
            $table->bigIncrements('rdc_id');
            $table->unsignedBiginteger('rdc_user_id');
            $table->unsignedBiginteger('rdc_rqd_id');
            $table->string('rdc_file');
            $table->timestamps();

            $table->renameColumn('updated_at', 'rdc_updated_at');
            $table->renameColumn('created_at', 'rdc_created_at');
            $table->unsignedBigInteger('rdc_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rdc_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rdc_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'rdc_deleted_at');
            $table->string('rdc_sys_note')->nullable();


            $table->foreign('rdc_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rdc_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rdc_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rdc_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rdc_rqd_id')->references('rqd_id')->on('requirement_documents')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_document_collections');
    }
};
