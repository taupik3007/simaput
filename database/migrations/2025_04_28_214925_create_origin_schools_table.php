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
        Schema::create('origin_schools', function (Blueprint $table) {
            $table->bigIncrements('ors_id');
            $table->unsignedBiginteger('ors_user_id');
            $table->string('ors_school_name');
            $table->bigInteger('ors_npsn');
            $table->string('ors_un_participant_number')->nullable();
            $table->timestamps();
            $table->renameColumn('updated_at', 'ors_updated_at');
            $table->renameColumn('created_at', 'ors_created_at');
            $table->unsignedBigInteger('ors_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ors_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ors_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'ors_deleted_at');
            $table->string('ors_sys_note')->nullable();
            $table->foreign('ors_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ors_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ors_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_schools');
    }
};
