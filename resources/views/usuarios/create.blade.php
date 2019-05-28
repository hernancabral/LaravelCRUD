<!-- create.blade.php -->

@extends('layouts.main')

@section('content')

<div class="card">
  <div class="card-header">
    Nuevo Usuario
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ route('usuarios.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Nombre de Usuario:</label>
              <input type="text" class="form-control" name="nombre_usuario"/>
          </div>
          <div class="form-group">
              <label for="price">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group">
              <label for="quantity">Apellido</label>
              <input type="text" class="form-control" name="apellido"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
      </form>
  </div>
</div>
@endsection