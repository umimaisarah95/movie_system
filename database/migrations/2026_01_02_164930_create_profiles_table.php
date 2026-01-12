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
        Schema::create('profiles', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id('profile_id');
            // FOREIGN KEY → users.id
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('fullname');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('birthdate')->nullable();

            $table->timestamps();

            // FK constraint
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
