<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Profile;
use App\User;
use App\Lottery;
use App\Ticket;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\ValidationRules\Rules\Delimited;


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
    $users = User::role(['admin','cajero'])->simplepaginate(5);
    //$users = User::all();
    //dd($users);
    return view('admin.users.index',compact('users', 'roles','title'));
  }

  /**
   * Description for listarVendedores: filter users with rol vendedor
   *
   * @return Response
   *
   */
  public function listarVendedores(Request $request)
  {

    $users = User::role(['vendedor'])->with('profile')->orderBy('id', 'desc');

    if($request->ajax()){


        return datatables()->eloquent($users)
        ->editColumn('name', function(User $users) {
            return  $users->name;
         })
        ->addColumn('last_name', function(User $users) {
            return  $users->profile->last_name;
        })
        ->editColumn('email', function(User $users) {
            return  $users->email;
        })
        ->addColumn('phone', function(User $users) {
            return  $users->profile->phone;
        })
        ->addColumn('rol', function(User $users) {
            $rol = $users->getRoleNames();
            return
            '<span class="badge badge-success" style="color: black"><i class="fa fa-user"></i> '.  $rol[0] .'</span>';

        })
        ->addColumn('actions', function(User $users) {
            return
            '<span class="label label-rouded label-warning">6</span>';
        })
        ->rawColumns(['rol','actions'])
        ->toJson();


    }
    return view('admin.users.vendedor-datatable');


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
    $title = "Cliente";
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

  public function createCustomerSeller(Request $request)
  {

    return view('admin.users.cliente');

  }
  /**
   * [Description for createCliente:
   *
   * @return [type]
   *
   */
  /*/**
   * [Description for storeCliente: save cliente and vendedor
   *
   * @param Request $request
   *
   * @return [type]
   *
   */
  public function storeCustomer(User $user, Request $request)
  {

    $validate = $this->validate($request,[
      'name'      =>'required|max:30',
      'apellido'  =>'required|max:30',
      'email'     =>'nullable|unique:users|email|max:70',
      'identification_card'    =>'required|unique:profiles|numeric|min:30',
      'direccion' =>'required|max:80',
      'barrio'    =>'required|max:80',
      'phone'     =>'required|numeric|min:11',

    ]);

      $lotteries = Lottery::pluck('name','id');

      $email = $request->email ?? 'cliente@estrategiasmichu.com';
      $rol = $request->rol;
      if($rol == 'cliente'){
        $customer= new Customer();
        $customer->seller_id = auth()->user()->id;
        //$customer->ticket_id = $ticketId->id;
        $customer->identification_card = $request->identification_card;
        $customer->name = $request->name;
        $customer->last_name = $request->apellido;
        $customer->email = $email;
        //$customer->sede = $request->sede;
        $customer->address = $request->direccion;
        $customer->phone = $request->phone;
        $customer->status = 0;
        $customer->save();

        return redirect()->route('user.customersave',['customer'=>$customer->id]);
        //return view('admin.users.cliente-paso2',compact('customer','lotteries'));
      }


  }


  public function customerSave(Request $request)
  {


    $lotteries = Lottery::pluck('name','id');
    $customer = Customer::findOrFail($request->customer);



    return view('admin.users.cliente-paso2',compact('customer','lotteries'));

  }

  public function storeCustomerNumberTicket(Request $request)
  {

    //$tickets[]= $request->tickets;

    //return response()->json(['data'=>true, 'ticket'=>$request->tickets, 'abono'=>$request->abono ]);

    if($request->ajax()){

        $validate = $this->validate($request,[

            'tickets'  =>'required',

        ]);

        /*
        lottery_id:lottery_id,
        tickets   :tickets,
        customer  :customer,
        */
        $asignar = Ticket::select('id')
        ->where('lottery_id',$request->lottery_id)
        ->where('number_ticket',$request->tickets)
        ->where('status',0)
        ->first();
        /*
        if(!$asignar){

    $asignar_response = "El Número solicitado está vendido";
}
        */




    return response()->json(['data'=>true, 'ticket'=>$request->tickets, 'customer'=>$request->customer, 'lottery'=>$request->lottery_id,'asignar'=>$asignar->id ]);
    //return response()->json(['data'=>true, 'number'=>true, 'ticket'=>0055, 'abono'=>true ]);

    }

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

    ])->assignRole('cajero');


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


  public function updateCustomerSeller(Profile $profile, Request $request)
  {

      $validate = $this->validate($request,[

        'name'      =>'required|max:30',
        'last_name' =>'required|max:30',
        'sede'      =>'required|max:40',
        'address'   =>'required|max:80',
        'sector'    =>'required|max:80',
        'phone'     =>'required|numeric|min:11',

      ]);


      $user = User::findOrFail($profile->user_id);
      $user->name = $request->name;
      $user->update();


      $profile = Profile::findOrFail($request->id);
      $profile->name = $request->name;
      $profile->last_name= $request->last_name;
      $profile->sede = $request->sede;
      $profile->address = $request->address;
      $profile->phone = $request->phone;
      $profile->sector = $request->sector;
      $profile->update();

      $info = $user->getRoleNames();

      $request->session()->flash('succes', $info[0].': '.$request->name. '  actualizado correctamente');
      if($info[0]=="cliente"){
        $ruta = 'admin/clientes';
      }elseif($info[0]== 'vendedor'){
        $ruta ='admin/vendedores';
      }else{
        $ruta = 'admin/users';
      }

      return redirect($ruta);

  }
  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function updateRol(Request $request, User $user)
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

     }elseif($request->title=="Cliente")
     {
        return redirect('admin/clientes');

     }elseif($request->title =="Vendedor")
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
