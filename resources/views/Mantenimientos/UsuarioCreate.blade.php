@extends('layouts.app', ['activePage' => 'Usuario', 'titlePage' => __('Mantenimiento Usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('usuarios.crear')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Agregar Usuario') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-primary">{{ __('Regresar') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Identificación') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('identificacion') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}" name="identificacion" id="identificacion" type="text" placeholder="{{ __('Identificación') }}" value="{{ old('identificacion') }}" required="true" aria-required="true"/>
                      @if ($errors->has('identificacion'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('identificacion') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group">
                      <input class="form-control" name="nombre" id="nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('nombre') }}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Primer Apellido') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('apellido1') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('apellido1') ? ' is-invalid' : '' }}" name="apellido1" id="apellido1" type="text" placeholder="{{ __('1 Apellido') }}" value="{{ old('apellido1') }}" required="true" aria-required="true"/>
                      @if ($errors->has('apellido1'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('apellido1') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Segundo Apellido') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('apellido2') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" name="apellido2" id="apellido2" type="text" placeholder="{{ __('2 Apellido') }}" value="{{ old('apellido2') }}" required="true" aria-required="true"/>
                      @if ($errors->has('apellido2'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('apellido2') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Fecha nacimiento') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('fechaNacimiento') ? ' has-danger' : '' }}">
                      <input type="date" class="form-control{{ $errors->has('fechaNacimiento') ? ' is-invalid' : '' }}" name="fechaNacimiento" id="fechaNacimiento"  placeholder="{{ __('Fecha nacimiento') }}" value="{{ old('fechaNacimiento') }}" required="true" aria-required="true"/>
                      @if ($errors->has('fechaNacimiento'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('fechaNacimiento') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Correo Electrónico') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" type="text" placeholder="{{ __('Correo Electrónico') }}" value="{{ old('email') }}" required="true" aria-required="true"/>
                      @if ($errors->has('email'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Celular') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" id="celular" type="text" placeholder="{{ __('Celular') }}" value="{{ old('celular') }}" required="true" aria-required="true"/>
                      @if ($errors->has('celular'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('celular') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Rol') }}</label>
                  <div class="col-sm-7">
                   <div class="form-group{{ $errors->has('idRole') ? ' has-danger' : '' }}">
                     <select name="idRole" class="custom-select">
                        @foreach ($roles as $ro)
                            <option value="{{$ro->id}}" >{{$ro->nombreRole}}</option>
                            @endforeach
                       </select>
                    </div>
                  </div>
                </div>

                 <div class="row">
                   <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Contraseña') }}</label>
                   <div class="col-sm-7">
                     <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                       <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Contraseña') }}" value="" required />
                       @if ($errors->has('password'))
                         <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                       @endif
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirmar contraseña') }}</label>
                   <div class="col-sm-7">
                     <div class="form-group">
                       <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="{{ __('Confirmar contraseña') }}" value="" required />
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
