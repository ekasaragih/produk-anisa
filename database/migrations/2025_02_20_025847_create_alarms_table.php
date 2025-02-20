<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('alarms', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable(); 
            $table->time('jam');
            $table->string('nama_alarm');
            $table->string('hari')->nullable(); 
            $table->string('deskripsi')->nullable();
            $table->integer('snooze')->default(0);
            $table->integer('max_snooze')->default(3);
            $table->enum('aktif', ['yes', 'no'])->default('yes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alarms');
    }
};
