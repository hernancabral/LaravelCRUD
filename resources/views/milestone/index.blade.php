@extends('layouts.main')


@section('content')
<h1>Milestones</h1>

<div class="p-3">
    @include('partials.alert')
  <table class="table text-left table-hover">
    <thead class="font-weight-bold">
        <tr>
          <td>Codigo</td>
          <td>Nombre</td>
          <td>Monitor</td>
          <td style="width: 30px">Acción</td>
        </tr>
    </thead>
    <tbody>
        @foreach($milestones as $milestone)
        <tr>
            <td>{{$milestone->code}}</td>
            <td>{{$milestone->name}}</td>
            <td>{{$milestone->monitor ? "Activo" : "No Activo"}}</td>
            <td style="width: 30px">
            <a href="{{ route('milestone.edit',$milestone->id)}}" 
            class="btn btn-primary">Editar</a></td>         
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection