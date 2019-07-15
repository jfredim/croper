<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Figuras; // Instanciamos el modelo Tipos
use App\Subtipos; // Instanciamos el modelo Tipos

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

use App\Http\Requests\TareasRequestFig;

class FigurasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $figuras=Figuras::orderBy('id','DESC')->paginate(3);
        return view('figuras.index',compact('figuras')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtipos=Subtipos::all();
        $figuras=Figuras::all();

        return view('figuras.create',compact('subtipos')); ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareasRequestFig $request)
    {
        $figuras = new Figuras;
        
        $figuras->nombre = $request->nombre;
        $figuras->tipo_subtipo = $request->tipo_subtipo;
        $figuras->color = $request->color;
        $figuras->perimetro = $request->perimetro;
        $figuras->lado = $request->lado;
  
  
        $tip_sub=$figuras->tipo_subtipo;
        $lado=$figuras->lado;
        $perimetro=$figuras->perimetro;

        
        $grabar="S";
        if ($tip_sub=="Triangulo Equilatero") {
        	$perimetro_calculado= $lado * 3;
            if ($perimetro_calculado==$perimetro) {
        		$grabar="S";
		    }else {
        		$grabar="N";
	        }
		}        

       if ($grabar=="S") {  
			$figuras->save();
        	return redirect()->route('figuras.index')->with('sucess','Figura creada satisfactoriamente');
	   }else{
        	return redirect()->route('figuras.create')->with('no_success','Perimetro no concuerda Para el Triangulo Equilatero');	 
	   }
	   	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $figuras=Figuras::find($id);
        return  view('figuras.show',compact('figuras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $figuras=Figuras::find($id);
        return view('figuras.edit',compact('figuras'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TareasRequestFig $request, $id)
    {
        $figuras = Figuras::find($id);

    	$figuras->nombre = $request->nombre;
    	$figuras->tipo_subtipo = $request->tipo_subtipo;
    	$figuras->color = $request->color;
    	$figuras->perimetro = $request->perimetro;
    	$figuras->lado = $request->lado;


        $tip_sub=$figuras->tipo_subtipo;
        $lado=$figuras->lado;
        $perimetro=$figuras->perimetro;

        
        $grabar="S";
        if ($tip_sub=="Triangulo Equilatero") {
        	$perimetro_calculado= $lado * 3;
            if ($perimetro_calculado==$perimetro) {
        		$grabar="S";
		    }else {
        		$grabar="N";
	        }
		}        

       if ($grabar=="S") {  
			$figuras->save();
            return redirect()->route('figuras.index')->with('success','Figura actualizada satisfactoriamente');
	   }else{
            return redirect()->route('figuras.index')->with('no_success','Perimetro no concuerda Para el Triangulo Equilatero');
		}     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Figuras::find($id)->delete();
        return redirect()->route('figuras.index')->with('success','Figura eliminada satisfactoriamente');
    }
}
