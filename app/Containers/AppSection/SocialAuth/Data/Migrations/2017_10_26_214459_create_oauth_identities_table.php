<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create(config('vendor-socialAuth.user.table_name'), static function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('provider')->nullable();
            $table->string('social_id')->nullable();
            $table->string('email')->nullable();
            $table->string('nickname')->nullable();
            $table->string('name')->nullable();
            $table->text('avatar')->nullable();
            $table->text('token')->nullable();
            $table->text('refresh_token')->nullable();
            $table->string('expires_in')->nullable();
            $table->string('scopes')->nullable();
            $table->unique(['provider', 'social_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config('vendor-socialAuth.user.table_name'));
    }
};