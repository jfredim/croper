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
						
			@if(Session::has('no_success'))
			<div class="alert alert-info">
				{{Session::get('no_success')}}
			</div>
			@endif


      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Figuras</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('figuras.create') }}" class="btn btn-info" >Agregar Figuras</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Tipo_Subtipo</th>
               <th>Color</th>
               <th>Perimetro</th>
               <th>Lado</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($figuras->count())  
              @foreach($figuras as $figura)  
              <tr>
                <td>{{$figura->Nombre}}</td>
                <td>{{$figura->Tipo_Subtipo}}</td>
                <td>{{$figura->Color}}</td>
                <td>{{$figura->Perimetro}}</td>
                <td>{{$figura->Lado}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('FigurasController@edit', $figura->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('FigurasController@destroy', $figura->id)}}" method="post">
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
      
      {{ $figuras->links() }}
    </div>
  </div>
</section>
</div>

@endsection