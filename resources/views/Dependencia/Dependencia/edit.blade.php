@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Dependencia: {{ $dependencia->dependencia}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>			
			{!!Form::model($dependencia,['method'=>'PATCH','route'=>['dependencia.dependencia.update',$dependencia->id_dependencia],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="dependencia">Dependencia</label>
            	<input type="text" name="dependencia" required value="{{$dependencia->dependencia}}" class="form-control">
            </div>    		
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
    			<label>Materia</label>
    			<select name="id_materia" class="form-control">

    			 <!--   para mostrar un combo box  -->
    				@foreach ($materias as $mat)
    					@if ($mat->id_materia==$dependencia->id_materia)
    					<option value="{{$mat->id_materia}}" selected>{{$mat->area_materia}}</option>
    					@else
						<option value="{{$mat->id_materia}}">{{$mat->area_materia}}</option>
    					@endif
    				@endforeach
    			</select>
    		</div>
    	</div>
    	
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    	    <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>	
    	</div>    	
    </div>

			{!!Form::close()!!}		

@endsection