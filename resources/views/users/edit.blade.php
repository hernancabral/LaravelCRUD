<!-- edit.blade.php -->

@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-header">
    Estas editando al Usuario {{$user->name}}
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
      <!-- <form method="post" action="{{ route('users.update', $user->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Email:</label>
              <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar informacion</button>
      </form>
  </div> -->

  <div class="card-body">
      <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        {{ method_field('patch') }}    
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{$user->name}}" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" readonly>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Actualizar') }}
                  </button>
                  <form action="{{ route('users.reset', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <button class="btn btn-danger" type="submit">Reset</button>
                  </form>
              </div>
              
          </div>
      </form>

      
  </div>
</div>
@endsection