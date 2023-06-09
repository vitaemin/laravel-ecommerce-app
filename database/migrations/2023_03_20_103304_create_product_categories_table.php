<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_categories')) {
            Schema::create('product_categories', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('category_id')->index();
                $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
                $table->unsignedBigInteger('product_id')->unsigned()->index();
                $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
