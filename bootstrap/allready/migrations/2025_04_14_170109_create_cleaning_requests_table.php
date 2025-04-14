<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cleaning_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->string('phone');
            $table->dateTime('desired_date');
            $table->enum('service_type', [
                'general_cleaning',
                'deep_cleaning',
                'post_construction',
                'carpet_cleaning',
                'other'
            ]);
            $table->text('custom_service')->nullable();
            $table->enum('payment_type', ['cash', 'card']);
            $table->enum('status', ['new', 'in_progress', 'completed', 'canceled'])->default('new');
            $table->text('cancel_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cleaning_requests');
    }
};
