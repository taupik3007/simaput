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
        Schema::create('mates', function (Blueprint $table) {
            $table->bigIncrements('mte_id');
            $table->unsignedBiginteger('mte_user_id');
            $table->string('mte_name');
            $table->bigInteger('mte_nik');
            $table->string('mte_job');
            $table->string('mte_nip')->nullable();
            $table->timestamps();

            $table->renameColumn('updated_at', 'mte_updated_at');
            $table->renameColumn('created_at', 'mte_created_at');
            $table->unsignedBigInteger('mte_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('mte_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('mte_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'mte_deleted_at');
            $table->string('mte_sys_note')->nullable();


            $table->foreign('mte_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mte_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mte_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mte_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mates');
    }
};
