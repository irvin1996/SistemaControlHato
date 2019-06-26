<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use DB;
use App\Role;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
  //index
  public function getIndexRol(){
         $rol= Role::orderBy('nombreRole','asc')->get();
     return view('Mantenimientos.RoleIndex',['ro'=>$rol]);
  }

  //Create
    public function getRolCreate(){
      $rol= Role::all();
       return view('Mantenimientos.roleCreate',['ro'=>$rol]);
   }

   //Post Create
   public function postRolCreate(Request $request)
   {

       $this->validate($request, [
       'nombreRole' => 'required|min:4|unique:roles'
       ]);

        $rol = new Role(['nombreRole'=> $request->input('nombreRole')
        ]);
        $rol->save();
        return redirect()->route('roles.index');

   }


   //Edit GET

   public function getRolEditar($id)
   {
    $rol = Role::find($id);
   return view('Mantenimientos.RoleEdit',['ro'=>$rol,'rolID'=>$id]);
   }

   // POST Edit
   public function postRolUpdate(Request $request)
   {
        $this->validate($request, [
            'nombreRole' => 'required|min:4|unique:roles'
        ]);
        $rol=Role::find($request->input('id'));

        $rol->nombreRole=$request->input('nombreRole');
        $rol->save();
        return redirect()->route('roles.index');
   }

   //SoftDeletes

   //Remove

      public function destroyRol($id)
      {
          $rol=Role::find($id);
          $rol->delete();
            return redirect()->route('roles.index')->with('deleted' , $id );
      }

     //Resturar un elemento
      public function RolRestore( $id )
        {
            //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
              $rol=Role::withTrashed()->where('id', '=', $id)->first();

            //Restauramos el registro
              $rol->restore();

            return redirect()->route('roles.index')->with('restore' , $id );
        }
}
