<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtipos; // Instanciamos el modelo SubTipos
use App\Tipos; // Instanciamos el modelo Tipos

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

use App\Http\Requests\TareasRequestSub;

class SubtiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
 //       $tipos=Tipos::find($Tipo);

        $subtipos=Subtipos::orderBy('id','DESC')->paginate(3);
        return view('subtipos.index',compact('subtipos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $subtipos = Subtipos::all();
         $tipos=Tipos::all();
         return view('subtipos.create',compact('tipos')); ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareasRequestSub $request)
    {
        //
        $subtipos = new Subtipos;
        
        $subtipos->tipo = $request->tipo;
        $subtipos->nombre = $request->nombre;
        $subtipos->descripcion = $request->descripcion;

		$subtipos->save();
        
        return redirect()->route('subtipos.index')->with('success','Subtipo creado satisfactoriamente');
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

        $subtipo=Subtipos::find($id);
        return  view('subtipos.show',compact('subtipo'));
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
         $subtipos=Subtipos::find($id);
        return view('subtipos.edit',compact('subtipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TareasRequestSub  $request, $id)
    {
        //
        
        $subtipos = Subtipos::find($id);
    	$subtipos->tipo = $request->tipo;
    	$subtipos->nombre = $request->nombre;
    	$subtipos->descripcion = $request->descripcion;

		$subtipos->save(); 
        
        return redirect()->route('subtipos.index')->with('success','Subtipo actualizado satisfactoriamente');
 
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
          Subtipos::find($id)->delete();
        return redirect()->route('subtipos.index')->with('success','Subtipo eliminado satisfactoriamente');
    }
}
