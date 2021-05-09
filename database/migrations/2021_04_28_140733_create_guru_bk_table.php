<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruBkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_bk', function (Blueprint $table) {
            $table->string('nip',25)->primary();
            $table->string('nama',50);
            $table->enum('jenis_kelamin',['Pria', 'Wanita']);
            $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha']);
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('telepon');
            $table->string('email');
            $table->text('foto');
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
        Schema::dropIfExists('guru_bk');
    }
}
