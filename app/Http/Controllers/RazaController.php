<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Raza;

class RazaController extends Controller
{
  //index
  public function getIndexRaza(){
         $Raza =  Raza::orderBy('nombreRaza','asc')->get();
     return view('Mantenimientos.RazaIndex',['raza'=>$Raza]);
  }

  //Create
    public function getRazaCreate(){
      $Raza= Raza::all();
       return view('Mantenimientos.RazaCreate',['raza'=>$Raza]);
   }


    public function postRazaCreate(Request $request)
    {

        $this->validate($request, [
        'nombreRaza' => 'required|min:2|unique:razas'
        ]);

         $Raza = new Raza([
        'nombreRaza'=> $request->input('nombreRaza')
         ]);
         $Raza->save();
         return redirect()->route('Raza.index');

    }


    //Edit

   public function getRazaEditar($id)
   {
     $Raza = Raza::find($id);
  return view('Mantenimientos.RazaEdit',['raza'=>$Raza,'razaID'=>$id]);
   }

   public function postRazaUpdate(Request $request)
    {
         $this->validate($request, [
             'nombreRaza' => 'required|min:2|unique:razas'
         ]);
         $Raza=Raza::find($request->input('id'));

         $Raza->nombreRaza=$request->input('nombreRaza');
         $Raza->save();
         return redirect()->route('Raza.index');
   }

  //SoftDeletes

  //Remove


     public function destroyRaza($id)
     {
           $Raza=Raza::find($id);
         $Raza->delete();
       return redirect()->route('Raza.index')->with("deleted" , $id );
     }

    //Resturar un elemento
     public function RazaRestore( $id )
       {
           //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
             $Raza=Raza::withTrashed()->where('id', '=', $id)->first();

           //Restauramos el registro
             $Raza->restore();

           return redirect()->route('Raza.index')->with("restore" , $id );
       }





}
