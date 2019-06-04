@extends('layouts.main')


@section('content')
<h1>Plannings</h1>

<div>
  <a href="{{ route('planning.create') }}" class="btn btn-primary">Nuevo Planning</a>
</div>

<div class="p-3">
    @include('partials.alert')
  <table class="table text-left table-hover">
    <thead class="font-weight-bold">
        <tr>
          <td>Nombre</td>
          <td>Tag</td>
          <td>Actualizado</td>
          <td style="width: 60px;" colspan='2' class="text-center">Acción</td>
        </tr>
    </thead>
    <tbody>
        @foreach($plannings as $planning)
        <tr>
            <td>{{$planning->name}}</td>
            <td>{{$planning->tag->name}}</td>
            <td>{{$planning->updated_at}}</td>
            <td style="width: 30px">
            <a href="{{ route('planning.edit',$planning->id)}}" 
              class="btn btn-primary">Editar</a></td>
            <td style="width: 30px">
                <form action="{{ route('planning.destroy', $planning) }}" method="post">
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