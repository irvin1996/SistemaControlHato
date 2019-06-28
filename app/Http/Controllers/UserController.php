<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use DB;
Use Alert;
Use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{


  //index
  public function getIndexUsuario(){
         $User =  User::orderBy('identificacion','asc')->get();
         $roll=Role::all();
     return view('Mantenimientos.UsuarioIndex',['usuario'=>$User,'ro'=>$roll]);
  }

  //Create
    public function getUsuarioCreate(){
      $User= User::all();
      $roll=Role::all();
       return view('Mantenimientos.UsuarioCreate',['roles'=>$roll,'usuario'=>$User]);
   }


    public function postUsuarioCreate(Request $request)
    {

      $this->validate($request, [

          'identificacion' => 'required|string|min:9|max:9',
          'nombre' => 'required|string|min:3|max:30',
          'apellido1' => 'required|string|min:3|max:20',
          'apellido2' => 'required|string|min:3|max:20',
          'fechaNacimiento' => 'required|date',
          'correo' => 'required|email|string|max:255|unique:users,email',
          'celular' => 'required|string|min:8|',
          'password' => 'required|string|confirmed'
        ]);

        $us = new User([
           'identificacion'=> $request->input('identificacion'),
           'name'=>$request->input('nombre'),
           'apellido1'=> $request->input('apellido1'),
           'apellido2'=> $request->input('apellido2'),
           'fechaNacimiento'=> $request->input('fechaNacimiento'),
           'email'=> $request->input('email'),
           'celular'=> $request->input('celular'),
           'password'=> $password=Hash::make( $request->input('password')),
      ]);
            $miRole=Role::find($request->input('idRole'));
            $us->roles()->associate($miRole);

            $us->save();

            return redirect()->route('usuarios.index');

    }

    //Edit

   public function getUsuarioEditar($id)
   {
     $User = User::find($id);
     $rol=Role::all();
  return view('Mantenimientos.UsuarioEdit',['usuario'=>$User,'roll'=>$rol,'usuarioID'=>$id]);
   }

   public function postUsuarioUpdate(Request $request)
    {
      $this->validate($request, [
           'identificacionE' => 'required|string|min:3|max:30',
           'nombreE' => 'required|string|min:3|max:30',
           'apellido1E' => 'required|string|min:3|max:20',
           'apellido2E' => 'required|string|min:3|max:20',
           'fechaNacimientoE' => 'required|date',
           'correoE' => 'required|email|string|max:255',
           'celularE' => 'required|string|min:8|',
         ]);

          $us=User::find($request->input('id'));
          $us->identificacion=$request->input('identificacionE');
          $us->name=$request->input('nombreE');
          $us->apellido1=$request->input('apellido1E');
          $us->apellido2=$request->input('apellido2E');
          $us->fechaNacimiento=$request->input('fechaNacimientoE');
          $us->email=$request->input('emailE');
          $us->celular=$request->input('celularE');
          $miRole=Role::find($request->input('idRoleE'));
          $us->password=Hash::make( $request->input('password'));
          $us->roles()->associate($miRole);

        /*  if ($us->id==Auth::user()->id) {
            $this->validate($request, [
              'password' => 'required|string|confirmed',
            ]);
            $us->password=Hash::make( $request->input('password'));
          }*/

               $us->save();
               return redirect()->route('usuarios.index');
   }

  //SoftDeletes

  //Remove


     public function destroyUsuario($id)
     {
           $Usuario=User::find($id);
           $Usuario->delete();
            return redirect()->route('usuarios.index')->with('deleted' , $id );
     }

    //Resturar un elemento
     public function UsuarioRestore( $id )
       {
           //Indicamos que la busqueda se haga en los registros eliminados con withTrashed
             $Usuario=User::withTrashed()->where('id', '=', $id)->first();

           //Restauramos el registro
             $Usuario->restore();

           return redirect()->route('usuarios.index')->with('restore' , $id );
       }




















    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
