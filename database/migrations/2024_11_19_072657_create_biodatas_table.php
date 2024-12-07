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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->bigincrements('bio_id');
            $table->unsignedBiginteger('bio_user_id');
            $table->bigInteger('bio_nik');
            $table->longtext('bio_description')->nullable();
            $table->unsignedBiginteger('bio_religion_id')->nullable();
            $table->string('bio_place_of_birth')->nullable();
            $table->timestamp('bio_date_of_birth')->nullable();
            $table->bigInteger('bio_height')->nullable();
            $table->bigInteger('bio_weight')->nullable();
            $table->timestamps();

            $table->renameColumn('updated_at', 'bio_updated_at');
            $table->renameColumn('created_at', 'bio_created_at');
            $table->unsignedBigInteger('bio_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('bio_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('bio_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'bio_deleted_at');
            $table->string('bio_sys_note')->nullable();


            $table->foreign('bio_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bio_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bio_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bio_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bio_religion_id')->references('rlg_id')->on('religions')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
