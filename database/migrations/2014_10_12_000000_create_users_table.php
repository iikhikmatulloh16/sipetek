<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('name', 128);
            $table->text('bio')->nullable();
            $table->string('tempat_lahir', 48)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('status_perkawinan', 24)->nullable();
            $table->string('jenis_kelamin', 24)->nullable();
            $table->string('email', 48)->unique();
            $table->string('phone', 15)->unique();
            // Alamat
            // 
            // End Alamat
            $table->string('picture')->nullable();
            $table->boolean('role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
