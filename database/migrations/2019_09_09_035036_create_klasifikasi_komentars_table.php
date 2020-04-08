<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlasifikasiKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasifikasi_komentar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('komentar_id')->nullable();
            $table->text('preproses_komentar')->nullable();
            $table->float('nilai_positif', 12, 5)->nullable();
            $table->float('nilai_negatif', 12, 5)->nullable();
            $table->string('klasifikasi')->nullable();
            $table->enum('confusion_matrix', ['TP', 'FP', 'TN', 'FN'])->nullable();
            $table->timestamps();

            $table->foreign('komentar_id')
                ->references('id')
                ->on('komentar')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('klasifikasi')
                ->references('kelas')
                ->on('klasifikasi')
                ->onUpdate('cascade')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klasifikasi_komentar');
    }
}
