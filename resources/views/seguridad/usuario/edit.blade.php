@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario:   {{ $usuario->nombres.' '.$usuario->apellidos }}</h3>
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

	{!!Form::model($usuario,['method'=>'PATCH','route'=>['seguridad.usuario.update',$usuario->id],'files'=>'true'])!!}
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombres" >Nombre</label>
                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ $usuario->nombres }}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="apellidos" >Apellidos </label>
                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ $usuario->apellidos }}">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="usuario" >Usuario</label>
                <input id="usuario" type="text" class="form-control" name="usuario" value="{{ $usuario->usuario }}">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="email" >E-Mail </label>
                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="tipousuario" >Tipo</label>
                <select name="tipousuario" class="form-control">
                <!--   para mostrar un combo box  -->
                    @foreach ($tipousuario as $tusu)
                        <option value="{{$tusu->id}}">{{$tusu->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="password" >Password</label>
                <input id="password" type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="password-confirm" >Confirmar Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
    </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                @if (($usuario->imagenurl)!="")
                    <img src="{{asset('imagenes/logos/'.$usuario->imagenurl)}}" height="300px" width="300px">
                @endif
            </div>          
        </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
	</div>
	</div>
    {!!Form::close()!!} 
@endsection