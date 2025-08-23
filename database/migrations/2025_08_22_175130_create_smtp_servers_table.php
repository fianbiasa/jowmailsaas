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
        Schema::create('smtp_servers', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->string('ip_address');
            $table->string('ssh_username');
            $table->text('ssh_private_key');
            $table->string('config_path');
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_connection')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smtp_servers');
    }
};
