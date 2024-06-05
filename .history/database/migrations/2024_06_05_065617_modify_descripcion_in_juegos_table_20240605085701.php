<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDescripcionInJuegosTable extends Migration
{
    public function up()
    {
        Schema::table('juegos', function (Blueprint $table) {
            $table->text('descripcion')->change();
        });
    }

    public function down()
    {
        Schema::table('juegos', function (Blueprint $table) {
            $table->string('descripcion', 255)->change();
        });
    }
}
