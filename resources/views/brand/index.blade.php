@extends('layouts.main')

@section('content')
<h1>Brands</h1>

<div class="p-3">
  <table class="table text-left table-hover">
    <thead class="font-weight-bold">
        <tr>
          <td>Code</td>
          <td>Name</td>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr>
            <td>{{$brand->code}}</td>
            <td>{{$brand->name}}</td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection