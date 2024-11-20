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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->string('emp_gtk')->nullable();
            $table->string('emp_nuptk')->nullable();
            $table->string('emp_cv')->nullable();
            $table->string('emp_linkedin')->nullable();
            


            $table->timestamps();
            $table->renameColumn('updated_at', 'emp_updated_at');
            $table->renameColumn('created_at', 'emp_created_at');
            $table->unsignedBigInteger('emp_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('emp_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('emp_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'emp_deleted_at');
            $table->string('emp_sys_note')->nullable();


            $table->foreign('emp_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('emp_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('emp_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
