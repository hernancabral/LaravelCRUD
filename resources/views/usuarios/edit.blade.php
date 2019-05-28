<!-- edit.blade.php -->

@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-header">
    Estas editando al Usuario {{$usuario->nombre_usuario}}
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('usuarios.update', $usuario->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre de Usuario:</label>
              <input type="text" class="form-control" name="nombre_usuario" value="{{$usuario->nombre_usuario}}"/>
          </div>
          <div class="form-group">
              <label for="price">Nombre:</label>
              <input type="text" class="form-control" name="nombre" value="{{$usuario->nombre}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Apellido:</label>
              <input type="text" class="form-control" name="apellido" value="{{$usuario->apellido}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar informacion</button>
      </form>
  </div>
</div>
@endsection