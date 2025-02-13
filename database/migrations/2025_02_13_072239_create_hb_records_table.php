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
        Schema::create('hb_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->float('kadar_hb');
            $table->date('tanggal_cek');
            $table->string('tempat_lokasi');
            $table->string('indicated_anemia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hb_records');
    }

};
