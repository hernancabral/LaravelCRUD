<!-- index.blade.php -->

@extends('layouts.main')

@section('content')
<h1>Usuarios</h1>


<div>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo Usuario</a>
</div>

{{-- Filtros --}}
<form class="p-3" action="{{ route('users.index') }}">
  <div class="row">
    <div class="col-md-4">
      <input class="form-control form-control-sm" type="search" name="q" value="{{ $q }}">
    </div>

    <div class="col-md-2 col-3">
      <select name="sortBy" class="form-control form-control-sm" value="{{ $sortBy }}">
        @foreach($opciones as $filtro => $col)
          <option @if($col == $sortBy) selected @endif value="{{ $col }}">Buscar por {{ ucfirst($filtro) }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-2 col-3">
      <select name="orderBy" class="form-control form-control-sm" value="{{ $orderBy }}">
        @foreach(['asc', 'desc'] as $order)
          <option @if($order == $orderBy) selected @endif value="{{ $order }}">Orden {{ ucfirst($order) }}endente</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-3 col-3">
      <select name="perPage" class="form-control form-control-sm" value="{{ $perPage }}">
        @foreach(['10', '20','50','100'] as $page)
          <option @if($page == $perPage) selected @endif value="{{ $page }}">Mostrar {{ $page }} por pagina</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-1 col-3">
      <button type="submit" class="w-100 btn btn-sm bg-blue">Filtrar</button>
    </div>
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
          <td>Nombre</td>
          <td>Mail</td>
          <td>Fecha de Creacion</td>
          <td style="width: 90px" colspan="3" class="text-center">Accion</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td style="width: 30px"><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Editar</a></td>
            <td style="width: 30px">
                <a href="{{ route('users.reset', $user->id) }}" class="btn btn-warning">Resetar Password</a>
            </td> 
            <td style="width: 30px">
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
            </td>               
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>{{ $users->links() }}</div>
<div>

@endsection