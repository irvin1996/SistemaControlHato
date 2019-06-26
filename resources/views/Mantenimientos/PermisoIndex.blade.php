@extends('layouts.app', ['activePage' => 'Permiso', 'titlePage' => __('Mantenimiento Permiso')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('Permiso') }}</h4>
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
               <div class="alert alert-danger" role="alert"> Permiso borrado, si desea deshacer el cambio <a href="{{ route('permisos.restore', [Session::get('deleted')]) }}"><b><u>Click aqui</u></b></a> </div>
             @endif
             @if (Session::has('restored'))
               <div class="alert alert-success" role="alert"> Permiso restaurado</div>
             @endif

                 <br/>

              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{route('permisos.create')}}" class="btn btn-sm btn-primary">{{ __('Nuevo') }}</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                        {{ __('Permiso') }}
                    </th>
                    <th>
                      {{ __('Fecha Creación') }}
                    </th>
                    <th class="text-right">
                      {{ __('Acciones') }}
                    </th>
                  </thead>
                  <tbody>

                    @foreach($permi as $r)
                      <tr>
                        <td>
                          {{ $r->nombrePermiso}}
                        </td>
                          <td>
                          {{Date("d-M-Y",strtotime($r->created_at))}}
                        </td>
                        <td class="td-actions text-right">

                            <form action="#" method="post">
                                @csrf


                                <a rel="tooltip" class="btn btn-success btn-link" href="{{route('permisos.edit',['id'=>$r->id])}}" data-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <a rel="tooltip" class="btn btn-danger btn-link" href="{{route('permisos.delete',['id'=>$r->id])}}" data-original-title="" title="">
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
