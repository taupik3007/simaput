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
        Schema::create('religions', function (Blueprint $table) {
            $table->bigIncrements('rlg_id');
            $table->string('rlg_name');
            $table->timestamps();
            $table->renameColumn('updated_at', 'rlg_updated_at');
            $table->renameColumn('created_at', 'rlg_created_at');
            $table->unsignedBigInteger('rlg_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rlg_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rlg_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'rlg_deleted_at');
            $table->string('rlg_sys_note')->nullable();


            $table->foreign('rlg_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rlg_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rlg_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('religons');
    }
};
