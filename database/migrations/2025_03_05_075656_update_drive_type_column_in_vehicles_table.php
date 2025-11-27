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
        \DB::table('vehicles')->whereNotIn('drive_type', ['Right Side Driving', 'Left Side Driving']);

        Schema::table('vehicles', function (Blueprint $table) {
            $table->enum('drive_type', ['Right Side Driving', 'Left Side Driving'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
        });
    }
};
