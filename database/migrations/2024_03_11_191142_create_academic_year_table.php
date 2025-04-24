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
        Schema::create('academic_years', function (Blueprint $table) {
            $table->bigIncrements('acy_id');
            $table->unsignedBiginteger('acy_starting_year');
            $table->unsignedBigInteger('acy_year_over');
            $table->unsignedBigInteger('acy_status')->default(2);

            $table->timestamps();

            $table->renameColumn('updated_at', 'acy_updated_at');
            $table->renameColumn('created_at', 'acy_created_at');
            $table->unsignedBigInteger('acy_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('acy_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('acy_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'acy_deleted_at');
            $table->string('acy_sys_note')->nullable();


            $table->foreign('acy_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('acy_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('acy_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_year');
    }
};
