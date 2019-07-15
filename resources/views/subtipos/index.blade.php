@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
    
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
    
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Subtipos de Figuras Geometicas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('subtipos.create') }}" class="btn btn-info" >Agregar Subtipos</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Tipo</th>
               <th>Nombre</th>
               <th>Descripcion</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($subtipos->count())  
              @foreach($subtipos as $subtipo)  
              <tr>
                <td>{{$subtipo->Tipo}}</td>
                <td>{{$subtipo->Nombre}}</td>
                <td>{{$subtipo->Descripcion}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('SubtiposController@edit', $subtipo->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('SubtiposController@destroy', $subtipo->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                  </form> 
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>

      <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
					  <a href="{{URL('/')}}"  class="btn btn-info btn-block">Atras</a>
			</div>	
	  </div>
      
      {{ $subtipos->links() }}
    </div>
  </div>
</section>

@endsection