<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use DB;
use App\Permiso;
use Illuminate\Support\Facades\Input;
Use Alert;
class PermisosController extends Controller
{
  //index
  public function getIndexPermiso(){
         $Permiso = Permiso::orderBy('nombrePermiso','asc')->get();
     return view('Mantenimientos.PermisoIndex',['permi'=>$Permiso]);
  }

  //Create
    public function getPermisoCreate(){
      $Permiso= Permiso::all();
       return view('Mantenimientos.PermisoCreate',['permi'=>$Permiso]);
   }

   //Post Create
   public function postPermisoCreate(Request $request)
   {

       $this->validate($request, [
       'nombrePermiso' => 'required|min:2|unique:permisos'
       ]);

        $Permiso = new Permiso(['nombrePermiso'=> $request->input('nombrePermiso')
        ]);
        $Permiso->save();
        return redirect()->route('permisos.index')->with('success','Permiso: ' . $request->input('nombrePermiso').' guardado correctamente');

   }


   //Edit GET

   public function getPermisoEditar($id)
   {
    $Permiso = Permiso::find($id);
   return view('Mantenimientos.PermisoEdit',['permi'=>$Permiso,'permisoID'=>$id]);
   }

   // POST Edit
   public function postPermisoUpdate(Request $request)
   {
        $this->validate($request, [
            'nombrePermiso' => 'required|min:2|unique:permisos'
        ]);
        $Permiso=Permiso::find($request->input('id'));

        $Permiso->nombrePermiso=$request->input('nombrePermiso');
        $Permiso->save();
        return redirect()->route('permisos.index');
   }

   //SoftDeletes

   //Remove

      public function destroyPermiso($id)
      {
          $Permiso=Permiso::find($id);
          $Permiso->delete();
            return redirect()->route('permisos.index')->with('deleted' , $id );
      }

     //Resturar un elemento
      public function PermisoRestore( $id )
        {
            //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
              $Permiso=Permiso::withTrashed()->where('id', '=', $id)->first();

            //Restauramos el registro
              $Permiso->restore();

            return redirect()->route('permisos.index')->with('restore' , $id );
        }
}
