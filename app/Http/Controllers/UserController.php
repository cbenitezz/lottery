<?php 

namespace App\Http\Controllers;


use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller 
{

  
  public function __construct()
  {
     
  }
  
  
  
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $users = User::Paginate(5);
    $roles = Role::all();
    return view('admin.users.index',compact('users', 'roles'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('admin.users.create');
  }

  public function createCliente(){

    return view('admin.users.cliente'); 
      
  }
  public function storeCliente(Request $request)
  {
    $validate = $this->validate($request,[
      'name'      =>'required|max:30',
      'apellido'  =>'required|max:30',      
      'email'     =>'required|unique:users|email|max:70',
      'cedula'    =>'required|numeric|min:30',
      'direccion' =>'required|max:80',
      'barrio'    =>'required|max:80',
      'phone'     =>'required|numeric|min:11',

    ]);
    
      $user = new User;
      $user->name     = $request->name;
      $user->email    = $request->email;
      $user->password = bcrypt('password');
      $user->save();
      $user->assignRole('cliente');



    dd($request);


  }
  public function createVendedor(){

    return view('admin.users.vendedor'); 

      
  }

  public function storeVendedor(Request $request)
  {

    dd($request);
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $validate = $this->validate($request,[
      'name'=>'required|max:30',
      'email'=>'required|unique:users|email|max:70',
    ]);
    
    $user = User::create([
      'name'        => $request->name,
      'email'       => $request->email,
      'password'    => bcrypt('password'),

    ])->assignRole('usuario');

    
    Profile::create([

      "name"     => $user->name,
      "user_id"  => $user->id,

    ]);
   
    $request->session()->flash('succes', 'Usuario creado correctamente');
    return redirect('admin/users');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, User $user)
  {
     if ($request->roles) {

      $user->roles()->sync($request->roles);
      $request->session()->flash('succes', 'Rol asignado correctamente');

     } else {

      $request->session()->flash('error',  'Rol no asignado');

     }
     return redirect('admin/users');

  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request,$id)
  {
      $user = User::findOrFail($id);
      $user->delete();
      $request->session()->flash('succes', 'Usuario eliminado correctamente');
      return redirect('admin/users');
  }
  
}

?>