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
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('cft_id');
            $table->unsignedBiginteger('cft_user_id');
            $table->string('cft_name');
            $table->string('cft_file');
            $table->timestamps();

            $table->renameColumn('updated_at', 'cft_updated_at');
            $table->renameColumn('created_at', 'cft_created_at');
            $table->unsignedBigInteger('cft_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('cft_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('cft_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'cft_deleted_at');
            $table->string('cft_sys_note')->nullable();


            $table->foreign('cft_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cft_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cft_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cft_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
