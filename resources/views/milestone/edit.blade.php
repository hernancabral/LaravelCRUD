<!-- Por ahora la version mas completa-->

@extends('layouts.main')

@section('content')
<div class="card uper">
  <div class="card-header">
    Estas editando el Milestone: {{$milestone->name}}
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
      <form method="post" action="{{ route('milestone.update', $milestone->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Codigo: </label>
              <input type="text" class="form-control" name="code" value="{{$milestone->name}}" readonly/>
          </div>
          <div class="form-group">
              <label for="price">Nombre: </label>
              <input type="text" class="form-control" name="nombre" value="{{$milestone->code}}" readonly/>
          </div>
          <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
            <label>Monitoreo:</label>
            <select class="form-control" name="monitor">
                <option value="1" @if ($milestone->monitor == 1) selected @endif>Activo</option>
                <option value="0" @if ($milestone->monitor == 0) selected @endif>No Activo</option>
            </select>
          </div>          
          <!-- <div class="form-group">
              <label for="quantity">Monitoreo: </label>
              <input type="text" class="form-control" name="monitor" value="{{$milestone->apellido}}"/>
          </div> -->
          <button type="submit" class="btn btn-primary">Actualizar informacion</button>
      </form>
  </div>
</div>
@endsection