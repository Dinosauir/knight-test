<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_invitation_id')->constrained('battle_invitations');
            $table->unique('battle_invitation_id');
            $table->timestamps();
        });

        Schema::create('battle_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_id')->constrained('battles');
            $table->unsignedBigInteger('battleable_id');
            $table->enum('action_type', ['attack', 'survive', 'dead', 'win']);
            $table->decimal('action_value', 5, 2);
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
        Schema::dropIfExists('battles');
    }
};
