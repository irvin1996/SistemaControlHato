@extends('layouts.app', ['activePage' => 'Usuario', 'titlePage' => __('Mantenimiento Usuario')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('Usuario') }}</h4>
            <!--  <p class="card-category"> {{ __('Here you can manage users') }}</p> -->
            </div>
            <div class="card-body">
              @if (session('status'))
                <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>{{ session('status') }}</span>
                    </div>
                  </div>
                </div>
              @endif

              @if (Session::has('deleted'))
               <div class="alert alert-danger" role="alert"> Usuario borrado, si desea deshacer el cambio <a href="{{ route('usuarios.restore', [Session::get('deleted')]) }}"><b><u>Click aqui</u></b></a> </div>
             @endif
             @if (Session::has('restored'))
               <div class="alert alert-success" role="alert"> Usuario restaurado</div>
             @endif

                 <br/>

              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{route('usuarios.create')}}" class="btn btn-sm btn-primary">{{ __('Nuevo') }}</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                        {{ __('Identificación') }}
                    </th>
                    <th>
                      {{ __('Nombre') }}
                    </th>
                    <th>
                      {{ __('Correo electrónico') }}
                    </th>
                    <th>
                      {{ __('Celular') }}
                    </th>
                    <th>
                      {{ __('Rol') }}
                    </th>
                    <th class="text-right">
                      {{ __('Acciones') }}
                    </th>
                  </thead>
                  <tbody>

                    @foreach($usuario as $r)
                      <tr>
                        <td>
                          {{ $r->identificacion}}
                        </td>
                        <td>
                          {{$r->name.' '.$r->apellido1}}
                        </td>
                        <td>
                          {{ $r->email}}
                        </td>
                        <td>
                          {{ $r->celular}}
                        </td>
                        @foreach ($ro as $rols)
                            @if ($rols->id==$r->idRole)
                            <td  id="idTRole" >{{$rols->nombreRole}}</td>
                                    <?php $nombre=$rols->nombreRole ?>
                              @endif
                            @endforeach
                        <td class="td-actions text-right">

                            <form action="#" method="post">
                                @csrf


                                <a rel="tooltip" class="btn btn-success btn-link" href="{{route('usuarios.edit',['id'=>$r->id])}}" data-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <a rel="tooltip" class="btn btn-danger btn-link" href="{{route('usuarios.delete',['id'=>$r->id])}}" data-original-title="" title="">
                                  <i class="material-icons">close</i>
                                  <div class="ripple-container"></div>
                                </a>

                            </form>


                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>




        </div>
      </div>
   </div>
</div>
@endsection
