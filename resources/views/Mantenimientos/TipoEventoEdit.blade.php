@extends('layouts.app', ['activePage' => 'TipoEvento', 'titlePage' => __('Mantenimiento Tipo Evento')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('EventType.update')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')
            
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Evento') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="{{ route('TipoEvento.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo de Evento') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombretipoEvento') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombretipoEvento') ? ' is-invalid' : '' }}" name="nombretipoEvento" id="nombretipoEvento" type="text" placeholder="{{ __('Nombre Evento') }}" value="{{ old('nombretipoEvento', $tipEvent->nombretipoEvento) }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombretipoEvento'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombretipoEvento') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
                  <input type="hidden" name="id" value="{{$tpEvtID}}"/>
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
