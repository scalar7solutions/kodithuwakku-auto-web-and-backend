<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // strings
            $table->string('seo_url')->nullable()->change();
            $table->string('ex_color')->nullable()->change();
            $table->string('in_color')->nullable()->change();
            $table->string('features')->nullable()->change();
            $table->string('year')->nullable()->change();
            $table->string('chassis_no')->nullable()->change();
            $table->string('condition')->nullable()->change();
            $table->string('engine_capacity')->nullable()->change();
            $table->string('auction_grade')->nullable()->change();
            $table->string('interior_condition')->nullable()->change();

            // enums
            $table->enum('transmission', ['Auto', 'Manual', 'Triptonic'])
                ->nullable()
                ->default(null)
                ->change();

            $table->enum('fuel_type', ['Diesel', 'Petrol', 'Hybrid', 'Electric'])
                ->nullable()
                ->default(null)
                ->change();

            $table->enum('drive_type', ['Right Side Driving', 'Left Side Driving'])
                ->nullable()
                ->default(null)
                ->change();

            $table->enum('availability', ['Available', 'Arriving', 'Sold'])
                ->nullable()
                ->default(null)
                ->change();

            $table->enum('used_status', ['Brand New', 'Used'])
                ->nullable()
                ->default(null)
                ->change();

            // ints
            $table->integer('seats')->nullable()->change();
            $table->integer('doors')->nullable()->change();
            $table->integer('passengers')->nullable()->change();

            // flags
            $table->boolean('featured')->nullable()->change();
            $table->boolean('latest')->nullable()->change();
            $table->boolean('status')->nullable()->change();

            // counters / money
            $table->unsignedInteger('image_count')->nullable()->change();
            $table->bigInteger('monthly_price')->nullable()->change();
            $table->bigInteger('initial_payment')->nullable()->change();

            // NOTE:
            // columns that are already nullable in your screenshot
            // (mileage, editorContent, countries, price, created_at, updated_at)
            // don’t need to be changed here.
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // revert to NOT NULL + original defaults

            // strings
            $table->string('seo_url')->nullable(false)->change();
            $table->string('ex_color')->nullable(false)->change();
            $table->string('in_color')->nullable(false)->change();
            $table->string('features')->nullable(false)->change();
            $table->string('year')->nullable(false)->change();
            $table->string('chassis_no')->nullable(false)->change();
            $table->string('condition')->nullable(false)->change();
            $table->string('engine_capacity')->nullable(false)->change();
            $table->string('auction_grade')->nullable(false)->change();
            $table->string('interior_condition')->nullable(false)->change();

            // enums
            $table->enum('transmission', ['Auto', 'Manual', 'Triptonic'])
                ->nullable(false)
                ->default('Auto')
                ->change();

            $table->enum('fuel_type', ['Diesel', 'Petrol', 'Hybrid', 'Electric'])
                ->nullable(false)
                ->default('Petrol')
                ->change();

            $table->enum('drive_type', ['Right Side Driving', 'Left Side Driving'])
                ->nullable(false)
                ->default('Right Side Driving')
                ->change();

            $table->enum('availability', ['Available', 'Arriving', 'Sold'])
                ->nullable(false)
                ->default('Sold')
                ->change();

            $table->enum('used_status', ['Brand New', 'Used'])
                ->nullable(false)
                ->default('Brand New')
                ->change();

            // ints
            $table->integer('seats')->nullable(false)->change();
            $table->integer('doors')->nullable(false)->change();
            $table->integer('passengers')->nullable(false)->change();

            // flags
            $table->boolean('featured')->nullable(false)->default(1)->change();
            $table->boolean('latest')->nullable(false)->default(1)->change();
            $table->boolean('status')->nullable(false)->default(1)->change();

            // counters / money
            $table->unsignedInteger('image_count')->nullable(false)->default(0)->change();
            $table->bigInteger('monthly_price')->nullable(false)->default(0)->change();
            $table->bigInteger('initial_payment')->nullable(false)->default(0)->change();
        });
    }
};
