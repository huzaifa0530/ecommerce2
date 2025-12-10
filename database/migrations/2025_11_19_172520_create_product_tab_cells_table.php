<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_tab_cells', function (Blueprint $table) {
            $table->id();

            // Must match your insert fields
            $table->unsignedBigInteger('row_id');

            // You are inserting 0,1 so make it integer
            $table->integer('column_name')->nullable();

            // You are inserting 1 so it must be string or text
            $table->text('value')->nullable();

            $table->timestamps();

            // Foreign key to rows
            $table->foreign('row_id')
                ->references('id')
                ->on('product_tab_rows')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_tab_cells');
    }
};
