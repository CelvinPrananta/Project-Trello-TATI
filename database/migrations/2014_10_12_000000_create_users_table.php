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
            $table->string('name');
            $table->string('user_id');
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('join_date');
            $table->string('status')->nullable();
            $table->string('role_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('tema_aplikasi')->nullable();
            $table->string('status_online')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name'                         => 'Kelvin',
             'user_id'                      => 'ID_00001',
             'email'                        => 'kelvin.p2504@gmail.com',
             'username'                     => 'Kelvin',
             'employee_id'                  => '2024050107010',
             'join_date'                    => now()->toDayDateTimeString(),
             'status'                       => 'Active',
             'role_name'                    => 'Admin',
             'avatar'                       => 'photo_defaults.jpg',
             'password'                     => Hash::make('123456789'),
             'tema_aplikasi'                => 'Terang',
             'status_online'                => 'Offline',
             'created_at' => now(),
             'updated_at' => now()
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
        Schema::dropIfExists('users');
    }
}