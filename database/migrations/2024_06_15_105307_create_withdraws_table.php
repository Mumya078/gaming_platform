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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $orderStatusValues = array_column(\App\Enums\OrderStatus::cases(),'value');
            $table->string('user_name');
            $table->integer('user_id');
            $table->bigInteger('deposit_diamond');
            $table->integer('cashout_try');
            $table->string('iban');
            $table->enum('status',$orderStatusValues)->default(\App\Enums\OrderStatus::WAITING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
