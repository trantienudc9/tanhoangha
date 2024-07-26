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
        Schema::create('conditioning', function (Blueprint $table) {
            $table->id();
            $table->integer('supplies_id');
            $table->string('capacity')->comment('Công suất');
            $table->string('origin')->comment('Xuất xứ');
            $table->string('type')->comment('Loại máy');
            $table->string('gas_type')->comment('Loại gas');
            $table->string('technology')->comment('Công nghệ');
            $table->string('warranty')->comment('Bảo hành');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conditioning');
    }
};
