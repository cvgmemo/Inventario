@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
 	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
 		<h3>Listado de Areas <a href="materia/create"><button class="btn btn-success">Nuevo</button></a></h3>
 		@include('dependencia.materia.search')
 	</div>
 </div>

 <div class="row">
 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
 		<div class="table-responsive">
 			<table class="table table-striped table-bordered table-condensed table-hover">
 				<thead>
 					<th>Id</th>
 					<th>Area</th>
 					<th>Descripción</th>
 					<th>Opciones</th>
 				</thead>
 				@foreach ($materias as $mat)
 				<tr>
 					<td>{{ $mat->id_materia}}</td>
 					<td>{{ $mat->area_materia}}</td>
 					<td>{{ $mat->descripcion}}</td>
 					<td>
 						<a href="{{URL::action('MateriaController@edit',$mat->id_materia)}}"><button class="btn btn-info">Editar</button></a>
 						<a href="" data-target="#modal-delete-{{$mat->id_materia}}" data-toggLe="modal"><button class="btn btn-danger">Eliminar</button></a>
 					</td>
 				</tr>
 				@include('dependencia.materia.modal')
 				@endforeach
 			</table>
 		
 		</div>
 		{{$materias->render()}}
 	</div>
 </div>
@endsection