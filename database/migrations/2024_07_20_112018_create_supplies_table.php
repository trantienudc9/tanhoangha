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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("tên vật liệu");
            $table->string('type')->comment("loại");
            $table->integer('product_type')->comment("Loại sản phẩm");
            $table->integer('status')->comment("1: là sản phẩm bình thường; 2: sản phẩm nổi bật ưa chuộng; 3: sản phẩm mới");
            $table->string('URL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
