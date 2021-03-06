<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('username', 30)->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('id_outlet')->nullable();
            $table->enum('role', ['admin', 'kasir', 'owner']);
            $table->boolean('rules_check');
            $table->timestamps();
            $table->foreign('id_outlet')->references('id')->on('tb_outlet');
        });

        User::create([
            'nama' => 'Ziyadatul Khair',
            'username' => 'ziddkh',
            'password' => Hash::make('123123'),
            'id_outlet' => 1,
            'role' => 'admin',
            'rules_check' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_user');
    }
}
