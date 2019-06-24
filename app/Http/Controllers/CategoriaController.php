<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Categoria;

class CategoriaController extends Controller
{
    //


    //index
    public function getIndexCategoria(){
           $categoria =  Categoria::orderBy('nombreCategoria','asc')->get();
       return view('Mantenimientos.CategoriaIndex',['categoria'=>$categoria]);
    }

    //Create
      public function getCategoriaCreate(){
        $categoria= Categoria::all();
         return view('Mantenimientos.CategoriaCreate',['categoria'=>$categoria]);
     }


      public function postCategoriaCreate(Request $request)
      {

          $this->validate($request, [
          'nombreCategoria' => 'required|min:4|unique:categorias'
          ]);

           $categoria = new Categoria([
          'nombreCategoria'=> $request->input('nombreCategoria')
           ]);
           $categoria->save();
           return redirect()->route('Categoria.index');

      }


      //Edit

     public function getCategoriaEditar($id)
     {
       $categoria = Categoria::find($id);
    return view('Mantenimientos.CategoriaEdit',['categoria'=>$categoria,'catID'=>$id]);
     }

     public function postCategoriaUpdate(Request $request)
      {
           $this->validate($request, [
               'nombreCategoria' => 'required|min:4|unique:categorias'
           ]);
           $categoria=Categoria::find($request->input('id'));

           $categoria->nombreCategoria=$request->input('nombreCategoria');
           $categoria->save();
           return redirect()->route('Categoria.index');
     }

    //SoftDeletes

    //Remove


       public function destroyCategoria($id)
       {
             $categoria=Categoria::find($id);
           $categoria->delete();
         return redirect()->route('Categoria.index')->with("deleted" , $id );
       }

      //Resturar un elemento
       public function CategoriaRestore( $id )
         {
             //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
               $categoria=Categoria::withTrashed()->where('id', '=', $id)->first();

             //Restauramos el registro
               $categoria->restore();

             return redirect()->route('Categoria.index')->with("restore" , $id );
         }







}
