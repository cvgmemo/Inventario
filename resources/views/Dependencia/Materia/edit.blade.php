@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Materia: {{ $materia->area_materia}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::model($materia,['method'=>'PATCH','route'=>['dependencia.materia.update',$materia->id_materia]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="area_materia">Nombre</label>
            	<input type="text" name="area_materia" class="form-control" value="{{$materia->area_materia}}" placeholder="Nombre ...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control"  value="{{$materia->descripcion}}" placeholder="Descripción ...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
			{!!Form::close()!!}		
		</div>
	</div>
@endsection