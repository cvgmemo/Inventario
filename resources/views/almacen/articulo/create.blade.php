@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Artículo</h3>
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

			{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
    			<label>Categoria</label>
    			<select name="idcategoria" class="form-control">

    			 <!--   para mostrar un combo box  -->
    				@foreach ($categorias as $cat)
    					<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
    				@endforeach
    			</select>
    		</div>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" required value="{{old('modelo')}}" class="form-control" placeholder="Modelo ...">
            </div>          
        </div>        
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="marca">Marca</label>
            	<input type="text" name="marca" required value="{{old('marca')}}" class="form-control" placeholder="Marca ...">
            </div>     		
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="serial">Serial</label>
            	<input type="text" name="serial" required value="{{old('serial')}}" class="form-control" placeholder="Serial ...">
            </div>     		
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="bien_nac">Bien Nacional</label>
            	<input type="text" name="bien_nac" value="{{old('bien_nac')}}" class="form-control" placeholder="Bien Nacional ...">
            </div>     		
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="id_dependencia">Ubicacion</label>
                <select name="id_dependencia" id="id_dependencia" class="form-control selectpicker"  data-Live-search="true">
                    @foreach ($dependencias as $dependencia)
                    <option value="{{$dependencia->id_dependencia}}">{{$dependencia->dependencia}}</option>
                    @endforeach
                </select>
            </div>          
        </div>        
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control">
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