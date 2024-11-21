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
        Schema::create('employee_statuses', function (Blueprint $table) {
            $table->bigIncrements('ems_id');
            $table->unsignedBiginteger('ems_user_id');
            $table->timestamp('ems_start_date');
            $table->string('ems_sk_number');
            $table->bigInteger('ems_duration');
            $table->bigInteger('ems_status');
            $table->bigInteger('ems_inpassing_status');
            $table->unsignedbiginteger('ems_position_id');
            $table->timestamps();

            $table->renameColumn('updated_at', 'ems_updated_at');
            $table->renameColumn('created_at', 'ems_created_at');
            $table->unsignedBiginteger('ems_created_by')->unsigned()->nullable();
            $table->unsignedBiginteger('ems_deleted_by')->unsigned()->nullable();
            $table->unsignedBiginteger('ems_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'ems_deleted_at');
            $table->string('ems_sys_note')->nullable();


            $table->foreign('ems_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ems_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ems_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ems_user_id')->references('usr_id')->on('users')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_statuses');
    }
};
