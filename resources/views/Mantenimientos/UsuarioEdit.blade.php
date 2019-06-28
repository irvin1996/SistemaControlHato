@extends('layouts.app', ['activePage' => 'Usuario', 'titlePage' => __('Mantenimiento Usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('usuarios.update')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Usuario') }}</h4>
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
                    <div class="form-group{{ $errors->has('identificacionE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('identificacionE') ? ' is-invalid' : '' }}" name="identificacionE" id="identificacionE" type="text" placeholder="{{ __('Identificación') }}" value="{{ old('identificacionE', $usuario->identificacion) }}" required="true" aria-required="true"/>
                      @if ($errors->has('identificacionE'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('identificacionE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nombreE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nombreE') ? ' is-invalid' : '' }}" name="nombreE" id="nombreE" type="text" placeholder="{{ __('Nombre') }}" value="{{ old('nombreE', $usuario->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('nombreE'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nombreE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('1 Apellido') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('apellido1E') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('apellido1E') ? ' is-invalid' : '' }}" name="apellido1E" id="apellido1E" type="text" placeholder="{{ __('1 Apellido') }}" value="{{ old('apellido1E', $usuario->apellido1) }}" required="true" aria-required="true"/>
                      @if ($errors->has('apellido1E'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('apellido1E') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('2 Apellido') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('apellido2E') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('apellido2E') ? ' is-invalid' : '' }}" name="apellido2E" id="apellido2E" type="text" placeholder="{{ __('2 Apellido') }}" value="{{ old('apellido2E', $usuario->apellido2) }}" required="true" aria-required="true"/>
                      @if ($errors->has('apellido2E'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('apellido2E') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Fecha nacimiento') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('fechaNacimientoE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fechaNacimientoE') ? ' is-invalid' : '' }}" name="fechaNacimientoE" id="fechaNacimientoE" type="text" placeholder="{{ __('Fecha nacimiento') }}" value="{{ old('fechaNacimientoE', $usuario->fechaNacimiento) }}" required="true" aria-required="true"/>
                      @if ($errors->has('fechaNacimientoE'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('fechaNacimientoE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Correo electrónico') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('emailE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('emailE') ? ' is-invalid' : '' }}" name="emailE" id="emailE" type="text" placeholder="{{ __('Correo electrónico') }}" value="{{ old('fechaNacimientoE', $usuario->email) }}" required="true" aria-required="true"/>
                      @if ($errors->has('emailE'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('emailE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Celular') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('celularE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('celularE') ? ' is-invalid' : '' }}" name="celularE" id="celularE" type="text" placeholder="{{ __('Celular') }}" value="{{ old('celularE', $usuario->celular) }}" required="true" aria-required="true"/>
                      @if ($errors->has('celularE'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('celularE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Rol') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('celularE') ? ' has-danger' : '' }}">
                        <select id="idRoleE" required name="idRoleE" class="input-sm">
                              @foreach ($roll as $role)
                                <option value="{{$role->id}}" {{$usuario->idRole==$role->id?"selected":""}} >{{$role->nombreRole}}</option>
                              @endforeach
                        </select>
                        @if ($errors->has('idRoleE'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('idRoleE') }}</span>
                        @endif
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
                  <input type="hidden" name="id" value="{{$usuarioID}}"/>
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
