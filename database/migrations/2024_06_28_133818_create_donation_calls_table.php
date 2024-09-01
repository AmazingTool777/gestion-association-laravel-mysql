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
        Schema::create('donation_calls', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->unsignedBigInteger("collected_amount")->default(0);
            $table->unsignedBigInteger("required_amount");
            $table->string("photo")->nullable();
            $table->json("mobile_payment_phones"); // JSON array of phone numbers
            $table->unsignedBigInteger("request_id")->nullable();
            $table->unsignedBigInteger("type_id");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // Foreign key constraints
            $table->foreign("request_id")->references("id")->on("donation_call_requests");
            $table->foreign("type_id")->references("id")->on("donation_call_types");

            // Indexes
            $table->fullText(["title", "description"], "donation_call_full_text");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_calls');
    }
};
