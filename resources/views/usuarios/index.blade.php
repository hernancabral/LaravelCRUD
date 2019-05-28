<!-- index.blade.php -->

@extends('layouts.main')

@section('content')
<h1>Usuarios</h1>

<div>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Nuevo Usuario</a>
</div>

<div class="p-3">
  @if(session()->get('success'))
    <div class="alert alert-success p-3">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table text-left table-hover">
    <thead class="font-weight-bold">
        <tr>
          <td>Usuario</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td style="width: 60px" colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->nombre_usuario}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->apellido}}</td>
            <td style="width: 30px"><a href="{{ route('usuarios.edit',$usuario->id)}}" class="btn btn-primary">Edit</a></td>
            <td style="width: 30px">
                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
            </td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection