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
        Schema::create('educational_levels', function (Blueprint $table) {
            $table->bigIncrements('edl_id');
            $table->string('edl_name');
            $table->bigInteger('edl_degree_status');
            $table->timestamps();

            $table->renameColumn('updated_at', 'edl_updated_at');
            $table->renameColumn('created_at', 'edl_created_at');
            $table->unsignedBigInteger('edl_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('edl_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('edl_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'edl_deleted_at');
            $table->string('edl_sys_note')->nullable();


            $table->foreign('edl_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('edl_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('edl_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_levels');
    }
};
