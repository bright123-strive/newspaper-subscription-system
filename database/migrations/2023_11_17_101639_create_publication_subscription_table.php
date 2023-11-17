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
        Schema::create('publication_subscription', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedInteger('copies');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publication_subscription');
    }
};
