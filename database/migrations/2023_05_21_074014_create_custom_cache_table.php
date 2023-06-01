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
        Schema::create('orth_users_info', function (Blueprint $table) {
            $table->id('key')->nullable(false);
            $table->string('personal_github_info')->nullable(false);
            $table->string('personal_discord_info')->nullable(false);
        });

        Schema::create('users_codes', function (Blueprint $table) {
            $table->id('key')->nullable(false);
            $table->text('value');
            $table->foreign('key')->references('key')->on('orth_users_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orth_users_info');
        Schema::dropIfExists('cache');
    }
};
