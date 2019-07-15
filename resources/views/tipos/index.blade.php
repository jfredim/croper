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
          <div class="pull-left"><h3>Lista De Tipos de Figuras</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('tipos.create') }}" class="btn btn-info" >Agregar Tipos</a>
            </div>
          </div>
          <div class="table-container">
          
          
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Descripcion</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($tipos->count())  
              @foreach($tipos as $tipo)  
              <tr>
                <td>{{$tipo->Nombre}}</td>
                <td>{{$tipo->Descripcion}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('TiposController@edit', $tipo->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('TiposController@destroy', $tipo->id)}}" method="post">
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

      
      {{ $tipos->links() }}
    </div>
  </div>
</section>

@endsection