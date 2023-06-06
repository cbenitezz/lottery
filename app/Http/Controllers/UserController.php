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
use Faker\Factory as Faker;

class UserController extends Controller
{


  public function __construct()
  {

  }


  public function buscarVendedor()
  {

        return view('admin.users.buscar-vendedor');

  }

  public function buscarcedulavendedor(Request $request)
    {

      $seller = Profile::where('identification_card', (int)$request->input('identification_card'))->first();
    //dd($customer);
      if (!$seller) {
        // El customer no fue encontrado, muestra un mensaje personalizado
       // return response()->json(['message' => 'Customer NO encontrado'], 404);
        return redirect()->back()->with('message', 'Vendedor no encontrado, verifique el número de cédula, sin puntos o comas');
    }else {
        //return response()->json(['message' => 'Customer encontrado'], 404);
        return redirect()->route('user.show', ['seller' => $seller->id]);
    }
      //dd((int)$request->input('cedula'));
     // dd($customer);
    }


    public function show(User $seller, Request $request)
    {

        //dd($seller->id, $request);


        $customers = Customer::select(['id','identification_card','name','last_name','phone'])
        ->where('seller_id', $seller->id)
        ->with(['users'])
        ->orderBy('id', 'desc')->get();
//dd($customers);

        $profile = Profile::select(['id','name','last_name'])->where('user_id',$seller->id)->first();

        if ($request->ajax()){

            return datatables()->eloquent($customers)
            //return datatables()->query($customers)
            ->editColumn('id', function (Customer $customers) {
                dd($customers);
                return  $customers->id;
             })
             ->editColumn('identification_card', function (Customer $customers) {
                return  $customers->identification_card;
             })
             ->editColumn('name', function (Customer $customers) {
                return  $customers->name;
             })
             ->editColumn('last_name', function (Customer $customers) {

                return $customers->last_name;

             })
             ->editColumn('phone',function (Customer $customers) {
                return $customers->phone;
             })
             ->toJson();

        }

        return view('admin.users.show', compact('profile'));



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
    $users = User::role(['admin','cajero'])->simplepaginate(15);

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

    //$users = User::role(['vendedor'])->with('profile')->orderBy('id', 'desc');
    $profiles = Profile::whereHas('users', function($query){
        $query->role('vendedor');
   })->orderBy('id', 'desc');


    if($request->ajax()){
        return datatables()->eloquent($profiles)
        ->editColumn('name', function(Profile $profiles) {
            return  $profiles->name;
         })
        ->editColumn('last_name', function(Profile $profiles) {
            return  $profiles->last_name;
        })
        ->editColumn('identification_card', function(Profile $profiles) {
            return  $profiles->identification_card;
        })
        ->editColumn('phone', function(Profile $profiles) {
            return  $profiles->phone;
        })
        ->addColumn('asignar', function(Profile $profiles) {

            $button = '<a href="/admin/users/customersave/?customer=' .$profiles->users->id. '&modelo=seller"  name="eliminar" id="ff" class="active btn btn-primary btn-sm">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp; Asignar</a>&nbsp;&nbsp;
                <a href="/admin/users/editseller/' .$profiles->users->id.'"  name="editar" id="ff" class="active btn btn-info btn-sm">
                <i class="fa fa-user" aria-hidden="true"></i>&nbsp; Editar &nbsp;&nbsp;</a>

                ';
            return $button;
        })
        ->addColumn('actions', function(Profile $profiles) {

            $count = Ticket::select('number_ticket')->where('user_id',$profiles->users->id)->count();
            return '<a href="/listarticket/?customer=' .$profiles->users->id. '&modelo=seller"  name="eliminar" id="ff" class="label label-rouded label-warning" style="color:black">'.$count.'</a>';

        })
        ->rawColumns(['asignar','actions'])
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

     if($request->rol=="cliente"){
         return view('admin.users.cliente');
    }elseif($request->rol=="vendedor"){

        return view('admin.users.vendedor');
    }

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
   public function updateSeller(Request $request)
   {

    $validate = $this->validate($request,[
        'name'      =>'required|max:30',
        'apellido'  =>'required|max:30',
        'email'     =>'nullable|email|max:70',
        'direccion' =>'required|max:80',
        'barrio'    =>'required|max:80',
        'phone'     =>'required|numeric|min:11',

      ]);

      $lotteries = Lottery::pluck('name','id');
      $faker = Faker::create();
      $email_faker = $faker->email();
      $email = $request->email ?? $email_faker;

      //dd($request);
      $rol = $request->rol;
      if($rol == 'vendedor'){
        $seller= User::findOrFail($request->id);
        $seller->name     = $request->name;
        $seller->email    = $email;
        $seller->save();
        $seller->assignRole('vendedor');

        $profile = Profile::findOrFail($seller->id);
        $profile->name = $seller->name;
        $profile->last_name = $request->apellido;
        $profile->sector  = $request->barrio;
        $profile->address = $request->direccion;
        $profile->phone = $request->phone;
        $profile->save();

       // return redirect()->route('user.vendedores');
        return redirect()->route('user.vendedores');
       // return view('admin.users.cliente-paso2',compact('customer','lotteries'));
      }


   }



  public function storeCustomer(User $user, Request $request)
  {

    $validate = $this->validate($request,[
      'name'      =>'required|max:30',
      'apellido'  =>'required|max:30',
      'email'     =>'nullable|email|max:70',
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

        $customer->identification_card = $request->identification_card;
        $customer->name = $request->name;
        $customer->last_name = $request->apellido;
        $customer->email = $email;

        $customer->address = $request->direccion;
        $customer->phone = $request->phone;
        $customer->status = 0;
        $customer->save();


        return redirect()->route('user.customersave',['customer'=>$customer->id,'modelo'=>'customer']);
        //return view('admin.users.cliente-paso2',compact('customer','lotteries'));
      }


  }


  public function storeSeller(User $user, Request $request)
  {

    $validate = $this->validate($request,[
      'name'      =>'required|max:30',
      'apellido'  =>'required|max:30',
      'email'     =>'nullable|email|max:70',
      'identification_card'    =>'required|unique:profiles|numeric|min:30',
      'direccion' =>'required|max:80',
      'sede'    =>'required|max:80',
      'phone'     =>'required|numeric|min:11',

    ]);

      $lotteries = Lottery::pluck('name','id');
      $faker = Faker::create();
      $email_faker = $faker->email();
      $email = $request->email ?? $email_faker;

      //dd($email);
      $rol = $request->rol;
      if($rol == 'vendedor'){
        $seller= new User();
        $seller->name     = $request->name;
        $seller->email    = $email;
        $seller->password = bcrypt('vendedor2022');
        $seller->save();
        $seller->assignRole('vendedor');

        $profile = new Profile();
        $profile->user_id = $seller->id;
        $profile->identification_card = $request->identification_card;
        $profile->name = $seller->name;
        $profile->last_name = $request->apellido;
        $profile->sede = $request->sede;
        $profile->address = $request->direccion;
        $profile->phone = $request->phone;
        $profile->save();

       // return redirect()->route('user.vendedores');
        return redirect()->route('user.customersave',['customer'=>$seller->id,'modelo'=>'seller']);
       // return view('admin.users.cliente-paso2',compact('customer','lotteries'));
      }


  }

  public function customerSave(Request $request)
  {

    $lotteries = Lottery::pluck('name','id');
    $modelo = $request->modelo;
    if($modelo=='customer'){
        $customer = Customer::findOrFail($request->customer);
        $tipo_usuario = "Cliente";
        $ruta = '/customer';
    }elseif($modelo='seller'){
        $customer = User::findOrFail($request->customer);
        $tipo_usuario = "Vendedor";
        $ruta = '/admin/vendedores';
    }

    return view('admin.users.cliente-paso2',compact('customer','lotteries','tipo_usuario','ruta','modelo'));

  }





  public function storeCustomerNumberTicket(Request $request)
  {

    if($request->ajax()){

        $validate = $this->validate($request,[

            'tickets'  =>'required',

        ]);

        /*
        lottery_id:lottery_id,
        tickets   :tickets,
        customer  :customer,
        abono     :abono,
        modelo    :modelo,
        */
        $asignar = Ticket::select('id')
        ->where('lottery_id',$request->lottery_id)
        ->where('number_ticket','=',$request->tickets)
        ->where('status',0)
        ->count();
        //si asignar es igual a 1 indica que esta disponible para separar dicho numero
        if($asignar==1){

            $asignar = Ticket::select('id')
            ->where('lottery_id',$request->lottery_id)
            ->where('number_ticket','=',$request->tickets)
            ->where('status',0)
            ->first();

            $reserva = Ticket::findOrFail($asignar->id);
            $reserva->status =1;
            $reserva->update();
            $valorAsignar = 1;
            $idRegistroTicket = $asignar->id;


        }elseif($asignar==0){
            $valorAsignar = 0;
            $idRegistroTicket = 0;
        }

        return response()->json(['data'=>true, 'ticket'=>$request->tickets,
              'customer'=>$request->customer, 'lottery'=>$request->lottery_id,
              'valorAsignar'=>$valorAsignar, 'idRegistroTicket'=>$idRegistroTicket,
              'modelo'=>$request->modelo ]);


    }

  }




  public function registerNumberSeller(Request $request)
  {

    if($request->ajax()){
       /*
        numeros
        seller
        lottery
        */
        $number  = explode(' ',rtrim($request->numeros));
        $seller  = explode(' ',rtrim($request->seller));
        $lottery = explode(' ',rtrim($request->lottery));
        $idRegistroTicket = explode(' ',rtrim($request->idRegistroTicket));
        $modelo  = explode(' ',rtrim($request->modelo));
        //dd($modelo);

        foreach ($idRegistroTicket as $key => $value) {

            $asignar = Ticket::findOrFail($value);
            if($modelo[$key] =='customer'){
                $asignar->customer_id = $seller[$key];
            }elseif ($modelo[$key] =='seller') {
                $asignar->user_id = $seller[$key];
            }

            $asignar->lottery_id = $lottery[$key];
            $asignar->update();
        }

        return response()->json(['data'=>true,'modelo'=>$modelo ]);
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


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function editSeller($id)
  {

    $vendedor = Profile::findOrFail($id);

    return view('admin.users.edit_seller', compact('vendedor', 'vendedor'));




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
        'password'  =>'required|max:10',

      ]);


      $user = User::findOrFail($profile->user_id);
      $user->name = $request->name;
      $user->password = bcrypt($request->password);
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
