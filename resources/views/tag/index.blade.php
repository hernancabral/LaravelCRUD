@extends('layouts.main')

@section('content')
<h1>Tags</h1>

<div class="p-3">
  <table class="table text-left table-hover">
    <thead class="font-weight-bold">
        <tr>
          <td>Codigo</td>
          <td>Nombre</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)
        <tr>
            <td>{{$tag->code}}</td>
            <td>{{$tag->name}}</td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection