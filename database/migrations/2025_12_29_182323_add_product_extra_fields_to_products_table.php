<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('price_include_sh')->nullable();
            $table->string('price_include_blank')->nullable();

            $table->json('lead_time_sh')->nullable();
            $table->string('lead_time_repeat_blank')->nullable();

            $table->json('setup_charge_sh')->nullable();
            $table->json('repeat_setup_sh')->nullable();

            $table->string('MOQ_blank')->nullable(); 
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'price_include_sh',
                'price_include_blank',
                'lead_time_sh',
                'lead_time_repeat_blank',
                'setup_charge_sh',
                'repeat_setup_sh',
                'MOQ_blank',
            ]);
        });
    }
};
