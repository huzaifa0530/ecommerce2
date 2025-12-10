<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpecialOfferAndPopularFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_special_offer')->default(false)->after('other_specs');
            $table->boolean('is_popular')->default(false)->after('is_special_offer');
            $table->decimal('special_price_before', 10, 2)->nullable()->after('is_popular');
            $table->decimal('special_price_after', 10, 2)->nullable()->after('special_price_before');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'is_special_offer',
                'is_popular',
                'special_price_before',
                'special_price_after'
            ]);
        });
    }
}
