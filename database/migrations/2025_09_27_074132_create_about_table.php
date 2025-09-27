<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('study_program');
            $table->string('nim');
            $table->string('photo_path')->nullable();
            $table->date('creation_date');
            $table->text('technologies')->nullable();
            $table->timestamps();
        });

        // Insert default data
        DB::table('about')->insert([
            'name' => '[Nama Lengkap Anda]',
            'study_program' => '[Program Studi Anda]',
            'nim' => '[NIM Anda]',
            'creation_date' => '2025-09-26',
            'technologies' => json_encode(['Laravel 12', 'MySQL', 'Bootstrap 5', 'PHP 8.2+']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('about');
    }
};