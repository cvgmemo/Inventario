@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
 	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
 		<h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
 		@include('almacen.articulo.search')
 	</div>
 </div>

 <div class="row">
 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
 		<div class="table-responsive">
 			<table class="table table-striped table-bordered table-condensed table-hover">
 				<thead>
 					<th>Id</th>
 					<th>Nombre</th>
 					<th>Modelo</th>
 					<th>Marca</th>
 					<th>Serial</th>
 					<th>Bien Nac</th>
 					<th>Ubicacion</th>
 					<th>Imagen</th>
 					<th>Opciones</th>
 				</thead>
 				@foreach ($articulos as $art)
 				<tr>
 					<td>{{ $art->idarticulo}}</td>
 					<td>{{ $art->categoria}}</td>
 					<td>{{ $art->modelo}}</td>
 					<td>{{ $art->marca}}</td>
 					<td>{{ $art->serial}}</td>
 					<td>{{ $art->bien_nac}}</td>
					<td>{{ $art->dependencia}}</td>
 					<!--   para ver la imagen  -->
 					<td>
 						<img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{$art->idarticulo}}" height="100px" width="100px" class="img-thumbnail">
 					</td>
 					
 					<td>
 						<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-info">Editar</button></a>
 						<a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggLe="modal"><button class="btn btn-danger">Eliminar</button></a>
 					</td>
 				</tr>
 				@include('almacen.articulo.modal')
 				@endforeach
 			</table>
 		
 		</div>
 		{{$articulos->render()}}
 	</div>
 </div>
@endsection