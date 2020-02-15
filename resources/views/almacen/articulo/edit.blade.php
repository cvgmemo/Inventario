@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Artículo: {{ $articulo->nombre}}</h3>
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
			{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Categoria</label>
                <select name="idcategoria" class="form-control">

                 <!--   para mostrar un combo box  -->
                    @foreach ($categorias as $cat)
                        @if ($cat->idcategoria==$articulo->idarticulo)
                        <option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
                        @else
                        <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>    
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" required value="{{$articulo->modelo}}" class="form-control">
            </div>    		
    	</div>

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="marca">Marca</label>
            	<input type="text" name="marca" required value="{{$articulo->marca}}" class="form-control">
            </div>     		
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="serial">Serial</label>
            	<input type="text" name="serial" required value="{{$articulo->serial}}" class="form-control">
            </div>     		
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="bien_nac">Bien Nacional</label>
            	<input type="text" name="bien_nac" value="{{$articulo->bien_nac}}" class="form-control" placeholder="Bien Nacional ...">
            </div>     		
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Ubicacion</label>
                <select name="id_dependencia" id="id_dependencia" class="form-control">
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
            	@if (($articulo->imagen)!="")
					<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="300px" width="300px">
            	@endif
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