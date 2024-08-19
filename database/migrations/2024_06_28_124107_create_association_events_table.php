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
        Schema::create('association_events', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("photo");
            $table->dateTime("starts_at");
            $table->dateTime("ends_at");
            $table->string("location");
            $table->unsignedBigInteger("posted_by");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // Foreign Key constraints
            $table->foreign("posted_by")->references('id')->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('association_events');
    }
};
