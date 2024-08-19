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
        Schema::create('donation_call_requests', function (Blueprint $table) {
            $table->id();
            $table->json("payload");
            $table->enum("status", ["PENDING", "CONFIRMED", "REJECTED"])->default("PENDING");
            $table->unsignedBigInteger("requested_by");
            $table->unsignedBigInteger("approved_by")->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // Foreign key constraints
            $table->foreign("requested_by")->references("id")->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_call_requests');
    }
};
