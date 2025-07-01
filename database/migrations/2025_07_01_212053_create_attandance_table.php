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
        Schema::create('attendances', function (Blueprint $table) {
    $table->bigIncrements('att_id');

    $table->unsignedBigInteger('att_user_id'); // foreign ke users
    $table->date('att_date'); // tanggal presensi
    $table->time('att_check_in')->nullable(); // jam masuk
    $table->time('att_check_out')->nullable(); // jam pulang

    $table->string('att_status')->default('hadir'); // hadir/sakit/izin/alfa
    $table->text('att_note')->nullable(); // catatan opsional

    $table->timestamps();
    $table->renameColumn('created_at', 'att_created_at');
    $table->renameColumn('updated_at', 'att_updated_at');

    $table->unsignedBigInteger('att_created_by')->nullable();
    $table->unsignedBigInteger('att_updated_by')->nullable();
    $table->unsignedBigInteger('att_deleted_by')->nullable();

    $table->softDeletes();
    $table->renameColumn('deleted_at', 'att_deleted_at');

    $table->string('att_sys_note')->nullable();

    // Foreign keys
    $table->foreign('att_user_id')->references('usr_id')->on('users')->onDelete('cascade');
    $table->foreign('att_created_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('att_updated_by')->references('usr_id')->on('users')->onDelete('set null');
    $table->foreign('att_deleted_by')->references('usr_id')->on('users')->onDelete('set null');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attandance');
    }
};
