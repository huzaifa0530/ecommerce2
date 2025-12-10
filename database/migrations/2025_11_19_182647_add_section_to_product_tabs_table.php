<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product_tabs', function (Blueprint $table) {
            $table->string('section')->default('top')->after('title'); // 'top' or 'bottom'
        });
    }

    public function down()
    {
        Schema::table('product_tabs', function (Blueprint $table) {
            $table->dropColumn('section');
        });
    }
};
