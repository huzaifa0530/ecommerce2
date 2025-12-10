<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('product_tab_rows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tab_id')->constrained('product_tabs')->onDelete('cascade');
            $table->string('label');
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('product_tab_rows');
    }
};
