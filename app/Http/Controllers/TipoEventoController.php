<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\TipoEvento;

class TipoEventoController extends Controller
{

//index
public function getIndexTipoEvento(){
       $TipoEvento =  TipoEvento::orderBy('nombretipoEvento','asc')->get();
   return view('Mantenimientos.TipoEventoIndex',['tipEvento'=>$TipoEvento]);
}

//Create
  public function getTipoEventoCreate(){
    $TipoEvento= TipoEvento::all();
     return view('Mantenimientos.TipoEventoCreate',['tipEvent'=>$TipoEvento]);
 }


  public function postTipoEventoCreate(Request $request)
  {

      $this->validate($request, [
      'nombretipoEvento' => 'required|min:4|unique:tipo_eventos'
      ]);

       $tipEvent = new TipoEvento([
      'nombretipoEvento'=> $request->input('nombretipoEvento')
       ]);
       $tipEvent->save();
       return redirect()->route('TipoEvento.index');

  }


  //Edit

 public function getTipoEventoEditar($id)
 {
   $tipEvent = TipoEvento::find($id);
return view('Mantenimientos.TipoEventoEdit',['tipEvent'=>$tipEvent,'tpEvtID'=>$id]);
 }

 public function postTipoEventoUpdate(Request $request)
  {
       $this->validate($request, [
           'nombretipoEvento' => 'required|min:4|unique:tipo_eventos'
       ]);
       $tipEvent=TipoEvento::find($request->input('id'));

       $tipEvent->nombretipoEvento=$request->input('nombretipoEvento');
       $tipEvent->save();
       return redirect()->route('TipoEvento.index');
 }

//SoftDeletes

//Remove


   public function destroyEventType($id)
   {
         $tipEvent=TipoEvento::find($id);
       $tipEvent->delete();
     return redirect()->route('TipoEvento.index')->with("deleted" , $id );
   }

  //Resturar un elemento
   public function TipoEventoRestore( $id )
     {
         //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
           $tipEvent=TipoEvento::withTrashed()->where('id', '=', $id)->first();

         //Restauramos el registro
           $tipEvent->restore();

         return redirect()->route('TipoEvento.index')->with("restore" , $id );
     }







}
