@extends('layouts.app', ['activePage' => 'Rol', 'titlePage' => __('Mantenimiento Rol')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('roles.update')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Rol') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Rol') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombreRole') ? ' has-danger' : '' }}">
                      @if ($errors->has('nombreRole'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombreRole') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Rol') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombreRole') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombreRole') ? ' is-invalid' : '' }}" name="nombreRole" id="nombreRole" type="text" placeholder="{{ __('Rol') }}" value="{{ old('nombreRole', $ro->nombreRole) }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombreRole'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombreRole') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
                  <input type="hidden" name="id" value="{{$rolID}}"/>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
