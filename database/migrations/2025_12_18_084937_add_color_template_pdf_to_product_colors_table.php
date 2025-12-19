<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('product_colors', function (Blueprint $table) {
            $table->string('color_template_pdf')->nullable()->after('color_image');
        });
    }

    public function down()
    {
        Schema::table('product_colors', function (Blueprint $table) {
            $table->dropColumn('color_template_pdf');
        });
    }
};
