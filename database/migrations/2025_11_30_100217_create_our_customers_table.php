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
        Schema::create('our_customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->unsignedBigInteger('manufacture_id');
            $table->unsignedBigInteger('vehicle_model_id');
            $table->tinyInteger('status')->default(1); // 1 = Active, 0 = Inactive
            $table->unsignedInteger('image_count')->default(0);
            $table->timestamps();

            $table->foreign('manufacture_id')
                ->references('id')
                ->on('manufactures')
                ->onDelete('cascade');

            $table->foreign('vehicle_model_id')
                ->references('id')
                ->on('vehicle_models')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_customers');
    }
};
