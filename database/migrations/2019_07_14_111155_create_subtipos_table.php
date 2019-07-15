<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tipo');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->timestamps();
        });
    	
        DB::table('subtipos')->insert(array(
            'Tipo'=>'Triangulo',
            'Nombre'=>'Equilatero',
            'Descripcion'=>'Los 3 Labos Son Iguales',
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
        Schema::dropIfExists('subtipos');
    }
}
