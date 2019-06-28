@extends('layouts.app', ['activePage' => 'Permiso', 'titlePage' => __('Mantenimiento Permiso')])

@section('content')
  @include('sweetalert::alert')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('permisos.update')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Permiso') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="{{ route('permisos.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Permiso') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombrePermiso') ? ' has-danger' : '' }}">
                      @if ($errors->has('nombrePermiso'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombrePermiso') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Permiso') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombrePermiso') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombrePermiso') ? ' is-invalid' : '' }}" name="nombrePermiso" id="nombrePermiso" type="text" placeholder="{{ __('Permiso') }}" value="{{ old('nombrePermiso', $permi->nombrePermiso) }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombrePermiso'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombrePermiso') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
                  <input type="hidden" name="id" value="{{$permisoID}}"/>
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
