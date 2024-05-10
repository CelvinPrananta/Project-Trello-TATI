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
        Schema::create('daftar_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('role_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->timestamps();
        });

        DB::table('daftar_pegawai')->insert([
            ['name'                         => 'Kelvin',
             'user_id'                      => 'ID_00001',
             'email'                        => 'kelvin.p2504@gmail.com',
             'username'                     => 'Kelvin',
             'employee_id'                  => '2024050107010',
             'role_name'                    => 'Admin',
             'avatar'                       => 'photo_defaults.jpg'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_pegawai');
    }
};