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
        Schema::table('service_provider_details', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->decimal('latitude', 10, 8)->nullable()->after('city');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            $table->string('profile_type')->default('single')->after('longitude');
            $table->string('group_name')->nullable()->after('profile_type');
            $table->string('profile_picture')->nullable()->after('group_name');
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_provider_details', function (Blueprint $table) {
            //
        });
    }
};
