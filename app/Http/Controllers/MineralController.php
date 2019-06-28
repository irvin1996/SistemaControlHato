<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use DB;
use App\Mineral;
use Illuminate\Support\Facades\Input;
Use Alert;

class MineralController extends Controller
{
  //index
  public function getIndexMineral(){
         $Mineral = Mineral::orderBy('nombreMineral','asc')->get();
     return view('Minerales.index',['mine'=>$Mineral]);
  }

  //Create
    public function getMineralCreate(){
      $Mineral= Mineral::all();
       return view('Minerales.create',['mine'=>$Mineral]);
   }

   //Post Create
   public function postMineralCreate(Request $request)
   {

       $this->validate($request, [
       'nombreMineral' => 'required|min:2|unique:minerals'
       ]);

        $Mine = new Mineral(['nombreMineral'=> $request->input('nombreMineral')
        ]);
        $Mine->save();
        return redirect()->route('miner.index');

   }


   //Edit GET

   public function getMineralEditar($id)
   {
    $Mine = Mineral::find($id);
   return view('Minerales.edit',['mineral'=>$Mine,'mineralID'=>$id]);
   }

   // POST Edit
   public function postMineralUpdate(Request $request)
   {
        $this->validate($request, [
            'nombreMineral' => 'required|min:2|unique:minerals'
        ]);
        $Mine=Mineral::find($request->input('id'));

        $Mine->nombreMineral=$request->input('nombreMineral');
        $Mine->save();
        return redirect()->route('miner.index');
   }

   //SoftDeletes

   //Remove

      public function destroyMineral($id)
      {
          $mine=Mineral::find($id);
          $mine->delete();
            return redirect()->route('miner.index')->with('deleted' , $id );
      }

     //Resturar un elemento
      public function MineralRestore( $id )
        {
            //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
              $mine=Mineral::withTrashed()->where('id', '=', $id)->first();

            //Restauramos el registro
              $mine->restore();

            return redirect()->route('miner.index')->with('restore' , $id );
        }




}
