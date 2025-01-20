<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('city');
            $table->string('profile')->default('https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp');
            $table->boolean('tnc')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
