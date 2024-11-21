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
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->bigIncrements('edb_id');
            $table->unsignedBiginteger('edb_user_id');
            $table->unsignedBiginteger('edb_educational_level_id');
            $table->timestamp('edb_start_date');
            $table->timestamp('edb_end_date');
            $table->string('edb_faculty');
            $table->string('edb_major');
            $table->string('edb_degree');

            $table->renameColumn('updated_at', 'edb_updated_at');
            $table->renameColumn('created_at', 'edb_created_at');
            $table->unsignedBigInteger('edb_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('edb_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('edb_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'edb_deleted_at');
            $table->string('edb_sys_note')->nullable();


            $table->foreign('edb_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('edb_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('edb_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('edb_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('edb_educational_level_id')->references('edl_id')->on('educational_levels')->onDelete('cascade');

        

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_backgrounds');
    }
};
