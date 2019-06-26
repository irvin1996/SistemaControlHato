@extends('layouts.app', ['activePage' => 'Mineral', 'titlePage' => __('Mantenimiento Mineral')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('miner.update')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Mineral') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="{{ route('miner.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Mineral') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombreMineral') ? ' has-danger' : '' }}">
                      @if ($errors->has('nombreMineral'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombreMineral') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Mineral') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombreMineral') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombreMineral') ? ' is-invalid' : '' }}" name="nombreMineral" id="nombreMineral" type="text" placeholder="{{ __('Mineral') }}" value="{{ old('nombreMineral', $mineral->nombreMineral) }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombreMineral'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombreMineral') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
                  <input type="hidden" name="id" value="{{$mineralID}}"/>
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
