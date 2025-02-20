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
        Schema::table('alarms', function (Blueprint $table) {
            $table->timestamp('snooze_until')->nullable();
            $table->timestamp('dismissed_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('alarms', function (Blueprint $table) {
            $table->dropColumn(['snooze_until', 'dismissed_at']);
        });
    }
};
