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

//Create
  public function getTipoEventoCreate(){
    $TipoEvento=tipo_eventos::all();
     return view('tipoEvento.create',['tipEvent'=>$TipoEvento]);
 }


  public function postTipoEventoCreate(Request $request)
  {

      $this->validate($request, [
      'tipoEvento' => 'required|min:4|unique:tipoEvento'
      ]);

       $tipEvent = new tipo_eventos([
      'nombretipoEvento'=> $request->input('nombreTipoEvento')
       ]);
       $tipEvent->save();
       return redirect()->route('TipoEvento.index');

  }


  //Edit

public function getTipoEventoEditar(TipoEvento $id){

   $tipEvent= tipo_eventos::find($id->id);
 return view('TipoEvento.edit',['tipEvent'=>$tipEvent]);
 }


 public function getTipoEventoEdit(Request $request)
     {
       $this->validate($request, [
           'nombretipoEvento' => 'required|min:4|unique:tipoEvento'
       ]);
       $tipEvent=tipo_eventos::find($request->input('id'));

       $tipEvent->nombretipoEvento=$request->input('nombreTipoEvento');
       $tipEvent->save();
       return redirect()->route('TipoEvento.index');
 }

 //Remove

 //Eliminar
  





}
