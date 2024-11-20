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
        Schema::create('parenteds', function (Blueprint $table) {
            $table->bigIncrements('prn_id');
            $table->unsignedBiginteger('prn_user_id');
            $table->string('prn_father_name');
            $table->string('prn_father_occupation');
            $table->string('prn_father_phone');
            $table->string('prn_mother_name');
            $table->string('prn_mother_occupation');
            $table->string('prn_mother_phone');
            $table->string('prn_guardian_name');
            $table->string('prn_guardian_occupation');
            $table->string('prn_guardian_phone');
            $table->timestamps();

            $table->renameColumn('updated_at', 'prn_updated_at');
            $table->renameColumn('created_at', 'prn_created_at');
            $table->unsignedBigInteger('prn_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('prn_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('prn_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'prn_deleted_at');
            $table->string('prn_sys_note')->nullable();


            $table->foreign('prn_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('prn_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('prn_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('prn_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parenteds');
    }
};
