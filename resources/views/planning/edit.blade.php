<!-- edit.blade.php -->

@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-header">
    Estas editando al Planning {{$planning->name}}
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

  <div class="card-body">
      <form method="POST" action="{{ route('planning.update', $planning) }}">
        @csrf
        {{ method_field('patch') }}    
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                  name="name" placeholder="{{$planning->name}}" value="{{ old('name') }}" autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="tag_id" class="col-md-4 col-form-label text-md-right">{{ __('Tag Relacionada:') }}</label>
                <div class="col-md-6">
                <select name="tag_id" class="form-control form-control col-md-6" value="{{ $planning->tag->name }}">
                    @foreach($tags as $tag)
                    <option @if($tag->id == $planning->tag->id) selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                  @error('tag_id')
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
              </div>
              
          </div>
      </form>

      
  </div>
</div>
@endsection