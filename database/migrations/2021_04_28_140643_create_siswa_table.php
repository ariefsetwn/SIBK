<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nis',25)->primary();
            $table->string('nama',50);
            $table->enum('jenis_kelamin',['Pria', 'Wanita']);
            $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha']);
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('telepon');
            $table->string('email');
            $table->text('foto');
            $table->string('kelas_id',11)->unique();
            $table->string('tahun_ajaran',11)->unique();
            $table->string('nama_ortu',50);
            $table->string('telepon_ortu',12);
            $table->text('alamat_ortu');
            $table->string('pekerjaan_ortu',50);
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
        Schema::dropIfExists('siswa');
    }
}
