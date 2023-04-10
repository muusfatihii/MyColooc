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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedFloat('price');
            $table->string('title');
            $table->string('address');
            $table->boolean('validated')->default(false);
            $table->boolean('archived')->default(true);
            $table->boolean('student')->default(false);
            $table->unsignedInteger('maxP');
            $table->unsignedInteger('nbrRooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
