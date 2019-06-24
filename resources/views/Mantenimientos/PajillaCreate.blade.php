@extends('layouts.app', ['activePage' => 'Pajilla', 'titlePage' => __('Mantenimiento Pajilla')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('Pajilla.crear')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Agregar Pajilla') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('Pajilla.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Pajilla') }}</label>
                  <div class="col-sm-7">

                   <div class="form-group{{ $errors->has('nombrePajilla') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombrePajilla') ? ' is-invalid' : '' }}" name="nombrePajilla" id="nombrePajilla" type="text" placeholder="{{ __('Pajilla') }}" value="{{ old('nombrePajilla') }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombrePajilla'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombrePajilla') }}</span>
                      @endif
                    </div>

                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo Semen') }}</label>
                  <div class="col-sm-7">

                   <div class="form-group{{ $errors->has('semen') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('semen') ? ' is-invalid' : '' }}" name="semen" id="semen" type="text" placeholder="{{ __('Tipo semen') }}" value="{{ old('semen') }}" required="true" aria-required="true"/>
                      @if ($errors->has('semen'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('semen') }}</span>
                      @endif
                    </div>

                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
