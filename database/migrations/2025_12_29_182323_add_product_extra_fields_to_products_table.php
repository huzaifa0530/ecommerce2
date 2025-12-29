<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('price_include')->nullable();
            $table->string('lead_time')->nullable();
            $table->string('MOQ')->nullable();
            $table->text('price_includes')->nullable();
            $table->string('lead_time_repeat')->nullable();
            $table->string('setup_charge')->nullable();
            $table->string('repeat_setup')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'price_include',
                'lead_time',
                'MOQ',
                'price_includes',
                'lead_time_repeat',
                'setup_charge',
                'repeat_setup'
            ]);
        });
    }
};
