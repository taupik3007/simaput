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
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('adr_id');
            $table->unsignedBiginteger('adr_user_id');
            $table->string('adr_province');
            $table->string('adr_regency');
            $table->string('adr_district');
            $table->string('adr_village');
            // $table->string('adr_postal_code');
            $table->string('adr_detail');
            $table->timestamps();
            $table->renameColumn('updated_at', 'adr_updated_at');
            $table->renameColumn('created_at', 'adr_created_at');
            $table->unsignedBigInteger('adr_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('adr_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('adr_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'adr_deleted_at');
            $table->string('adr_sys_note')->nullable();


            $table->foreign('adr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adr_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
