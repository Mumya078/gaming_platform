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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->float('rate')->nullable();
            $table->string('desc')->nullable();
            $table->string('image')->nullable();
            $table->string('data_unityweb_name')->nullable();
            $table->string('js_unityweb_name')->nullable();
            $table->string('wasm_unityweb_name')->nullable();
            $table->string('loader_name')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
