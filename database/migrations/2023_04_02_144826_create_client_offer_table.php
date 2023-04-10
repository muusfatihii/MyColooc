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
        Schema::create('client_offer', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained('clients')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('offer_id')->constrained('offers')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->primary(['client_id','offer_id']);
            $table->tinyInteger('state')->default(0);
            $table->unsignedInteger('nbrColocs')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_offer');
    }
};
