<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre')->required();
            $table->string('Descripcion')->required();
            $table->timestamps();
        });
    	
        DB::table('tipos')->insert(array(
            'Nombre'=>'Triangulo',
            'Descripcion'=>'Posee 3 Labos',
            'created_at'=> date('Y-m-d H:m:s'),
            'updated_at'=> date('Y-m-d H:m:s')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
}
