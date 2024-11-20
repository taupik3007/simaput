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
        Schema::create('ijazahs', function (Blueprint $table) {
            $table->bigIncrements('ijz_id');
            $table->timestamp('ijz_date');
            $table->string('ijz_number');
            $table->unsignedBiginteger('ijz_user_id');
            $table->timestamps();
            $table->renameColumn('updated_at', 'ijz_updated_at');
            $table->renameColumn('created_at', 'ijz_created_at');
            $table->unsignedBigInteger('ijz_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ijz_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ijz_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'ijz_deleted_at');
            $table->string('ijz_sys_note')->nullable();


            $table->foreign('ijz_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ijz_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ijz_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ijz_user_id')->references('usr_id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ijazahs');
    }
};
