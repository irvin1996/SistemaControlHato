<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Pajilla;
class PajillaController extends Controller
{
    //



    //index
    public function getIndexPajilla(){
           $pajilla =  Pajilla::orderBy('nombrePajilla','asc')->get();
       return view('Mantenimientos.PajillaIndex',['pajilla'=>$pajilla]);
    }

    //Create
      public function getPajillaCreate(){
        $pajilla= Pajilla::all();
         return view('Mantenimientos.PajillaCreate',['pajilla'=>$pajilla]);
     }


      public function postPajillaCreate(Request $request)
      {

          $this->validate($request, [
          'nombrePajilla' => 'required|min:4|unique:pajillas',
          'semen'=>'required|min:4'
          ]);

           $pajilla = new Pajilla([
          'nombrePajilla'=> $request->input('nombrePajilla'),
          'semen'=> $request->input('semen')
           ]);
           $pajilla->save();
           return redirect()->route('Pajilla.index');

      }


      //Edit

     public function getPajillaEditar($id)
     {
       $pajilla = Pajilla::find($id);
    return view('Mantenimientos.PajillaEdit',['pajilla'=>$pajilla,'pajillaID'=>$id]);
     }

     public function postPajillaUpdate(Request $request)
      {
           $this->validate($request, [
               'nombrePajilla' => 'required|min:4|unique:pajillas',
               'semen'=>'required|min:4'
           ]);
           $pajilla=Pajilla::find($request->input('id'));

           $pajilla->nombrePajilla=$request->input('nombrePajilla');
           $pajilla->semen=$request->input('semen');
           $pajilla->save();
           return redirect()->route('Pajilla.index');
     }

    //SoftDeletes

    //Remove


       public function destroyPajilla($id)
       {
             $pajilla=Pajilla::find($id);
           $pajilla->delete();
         return redirect()->route('Pajilla.index')->with("deleted" , $id );
       }

      //Resturar un elemento
       public function PajillaRestore( $id )
         {
             //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
               $pajilla=Pajilla::withTrashed()->where('id', '=', $id)->first();

             //Restauramos el registro
               $pajilla->restore();

             return redirect()->route('Pajilla.index')->with("restore" , $id );
         }


}
