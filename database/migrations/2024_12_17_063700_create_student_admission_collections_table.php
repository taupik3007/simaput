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
        Schema::create('student_admission_registration', function (Blueprint $table) {
            $table->bigIncrements('sar_id');
            $table->unsignedBiginteger('sar_user_id');
            $table->unsignedBiginteger('sar_student_admission_id');
            $table->unsignedBigInteger('sar_major_id');
            $table->biginteger('sar_status')->default(1);
        
            $table->timestamps();
            $table->renameColumn('updated_at', 'sar_updated_at');
            $table->renameColumn('created_at', 'sar_created_at');
            $table->unsignedBigInteger('sar_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sar_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('sar_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'sar_deleted_at');
            $table->string('sar_sys_note')->nullable();

            $table->foreign('sar_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sar_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sar_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sar_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sar_student_admission_id')->references('sta_id')->on('student_admissions')->onDelete('cascade');
            $table->foreign('sar_major_id')->references('mjr_id')->on('majors')->onDelete('cascade');


           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_admission_collections');
    }
};
