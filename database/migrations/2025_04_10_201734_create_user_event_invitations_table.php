<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // content: The person who will attend the event can also attend as a guest of another person. However, there is a maximum of 1 guest.
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_event_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('event_id')->constrained('events');
            $table->string('name');
            $table->string('surname');
            $table->string('phone')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->tinyInteger('age');
            $table->boolean('is_accepted')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_event_invitations');
    }
};
