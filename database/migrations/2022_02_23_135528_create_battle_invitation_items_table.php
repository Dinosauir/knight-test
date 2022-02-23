<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battle_invitation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_invitation_id')->constrained('battle_invitations')->onDelete('cascade');
            $table->foreignId('knight_id')->constrained('knights')->onDelete('cascade');
            $table->string('token')->nullable();
            $table->enum('status', ['pending', 'rejected', 'accepted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battle_invitation_items');
    }
};
