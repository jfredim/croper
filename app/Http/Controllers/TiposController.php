<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos; // Instanciamos el modelo Tipos

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

use App\Http\Requests\TareasRequest;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos=Tipos::orderBy('id','DESC')->paginate(3);
        return view('tipos.index',compact('tipos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $tipos = Tipos::all();
         return view('tipos.create',compact('tipos')); ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareasRequest $request)
    {
        //
        $tipos = new Tipos;
        
        $tipos->nombre = $request->nombre;
        $tipos->descripcion = $request->descripcion;

		$tipos->save();
        
        return redirect()->route('tipos.index')->with('success','Tipo creado satisfactoriamente');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tipo=Tipos::find($id);
        return  view('tipos.show',compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipo=Tipos::find($id);
        return view('tipos.edit',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TareasRequest $request, $id)
    {
        //
        
        $tipos = Tipos::find($id);

    	$tipos->nombre = $request->nombre;
    	$tipos->descripcion = $request->descripcion;

		$tipos->save(); 
        
        return redirect()->route('tipos.index')->with('success','Tipo actualizado satisfactoriamente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          Tipos::find($id)->delete();
        return redirect()->route('tipos.index')->with('success','Tipo eliminado satisfactoriamente');
    }
}
