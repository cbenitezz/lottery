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
   * function that show users with rol admin and conventional usuario.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    $roles = Role::all();
    $title = "Usuarios del Sistema";
    $users = User::role(['admin','usuario'])->simplepaginate(5);
    return view('admin.users.index',compact('users', 'roles','title'));
  }

  /**
   * Description for listarVendedores: filter users with rol vendedor
   *
   * @return Response
   *
   */
  public function listarVendedores()
  {

    $roles = Role::all();
    $title = "Vendedores";
    $users = User::role(['vendedor'])->simplepaginate(5);
    return view('admin.users.index',compact('users', 'roles','title'));
  }

  /**
   * Description for listarClientes: filter users with rol cliente
   *
   * @return Response
   *
   */
  public function listarClientes()
  {
    $roles = Role::all();
    $title = "Clientes";
    $users = User::role(['cliente'])->simplepaginate(5);
    return view('admin.users.index',compact('users', 'roles','title'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function createUserSystem()
  {
    $title = "Crear Usuario";
    return view('admin.users.create',compact('title', 'title'));
  }


  /**
   * [Description for createCliente:
   *
   * @return [type]
   *
   */
  public function createCliente(){

    return view('admin.users.cliente');

  }

  public function createVendedor(){

    return view('admin.users.cliente');

  }

  public function createClienteVendedor(Request $request)
  {
      $title = $request->title;
      //if($request->title == )
      return view('admin.users.cliente',compact('title'));

  }


  /**
   * [Description for storeCliente: save cliente and vendedor
   *
   * @param Request $request
   *
   * @return [type]
   *
   */
  public function storeCliente(User $user, Request $request)
  {
    //dd($request);
    $validate = $this->validate($request,[
      'name'      =>'required|max:30',
      'apellido'  =>'required|max:30',
      'email'     =>'required|unique:users|email|max:70',
      'identification_card'    =>'required|unique:profiles|numeric|min:30',
      'city'      =>'required|max:40',
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

      $profile = new Profile;
      $profile->user_id = $user->id;
      $profile->identification_card = $request->identification_card;
      $profile->name = $request->name;
      $profile->last_name= $request->apellido;
      $profile->city = $request->city;
      $profile->address = $request->direccion;
      $profile->phone = $request->phone;
      $profile->sector = $request->barrio;
      $profile->save();


      return redirect('admin/clientes');


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
      "identification_card" =>"0",

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


  public function updateCustomerSeller(User $user, Request $request)
  {

      $validate = $this->validate($request,[

        'name'      =>'required|max:30',
        'last_name' =>'required|max:30',
        'city'      =>'required|max:40',
        'address'   =>'required|max:80',
        'sector'    =>'required|max:80',
        'phone'     =>'required|numeric|min:11',

      ]);


      $user = User::findOrFail($user->id);
      $user->name = $request->name;
      $user->update();


      $profile = Profile::findOrFail($request->id);
      $profile->name = $request->name;
      $profile->last_name= $request->last_name;
      $profile->city = $request->city;
      $profile->address = $request->address;
      $profile->phone = $request->phone;
      $profile->sector = $request->sector;
      $profile->update();

      if($request->title == "user.vendedor"){
        $uri = "/admin/vendedores";
      }elseif($request->title == "user.cliente"){
        $uri = "/admin/clientes";
      }else{
        $uri = "/admin/users";
      }

      $info = explode('/',$uri);
      $info = substr($info[2],0,-1);
      if($info == "user"){
        $info = "Usuario";
      }

      $request->session()->flash('succes', $info.': '.$request->name. '  actualizado correctamente');
      return redirect($uri);

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

     if($request->title == "Usuarios del Sistema")
     {
        return redirect('admin/users');

     }elseif($request->title=="Listado de Clientes")
     {
        return redirect('admin/clientes');

     }elseif($request->title =="Listado de Vendedores")
     {
        return redirect('admin/vendedores');
     }

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
