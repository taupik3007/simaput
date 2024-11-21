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
        Schema::create('resigns', function (Blueprint $table) {
            $table->bigIncrements('rsg_id');
            $table->unsignedBiginteger('rsg_user_id');
            $table->string('rsg_file');
            $table->string('rsg_reason');
            $table->bigInteger('status');
            $table->timestamps();

            $table->renameColumn('updated_at', 'rsg_updated_at');
            $table->renameColumn('created_at', 'rsg_created_at');
            $table->unsignedBigInteger('rsg_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rsg_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rsg_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'rsg_deleted_at');
            $table->string('rsg_sys_note')->nullable();


            $table->foreign('rsg_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rsg_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rsg_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rsg_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resigns');
    }
};
