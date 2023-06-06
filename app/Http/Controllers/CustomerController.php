<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerRecords;
use App\Ticket;
use App\User;
use App\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


       // $customers = CustomerRecords::select(['id','identification_card','name','last_name','phone','number_ticket','abono','seller'])->orderBy('id','desc')->get();

      $customers = Customer::select(['id','seller_id','name','last_name','identification_card','address','phone','sector'])->orderBy('id','desc');

        if($request->ajax()){


            return datatables()->eloquent($customers)
            //return datatables()->query($customers)
            ->editColumn('name', function(Customer $customers) {
                return  $customers->name;
             })
             ->editColumn('last_name', function(Customer $customers) {
                return  $customers->last_name;
             })
             ->editColumn('identification_card', function(Customer $customers) {
                return  $customers->identification_card;
             })
             ->editColumn('phone', function(Customer $customers) {
                return  $customers->phone;
             })
             ->editColumn('address', function(Customer $customers) {
                return  $customers->address;
             })
             ->editColumn('seller', function(Customer $customers) {
                $seller = User::select(['name'])->where('id', $customers->seller_id)->first();
                return  $seller->name;
             })->addColumn('actions', function(Customer $customers) {

                $count = Ticket::select('number_ticket')->where('customer_id',$customers->id)->count();
                return '<a href="/listarticket/?customer=' .$customers->id. '&modelo=customer"  name="eliminar" id="ff" class="label label-rouded label-warning" style="color:black">'.$count.'</a>';

            })
            ->addColumn('asignar', function(Customer $customers) {

                $button = '<a href="/admin/users/customersave/?customer=' .$customers->id. '&modelo=customer"  name="eliminar" id="ff" class="active btn btn-primary btn-sm">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp; Asignar</a>&nbsp;&nbsp;';
                return $button;
            })
            ->rawColumns(['actions', 'asignar'])->toJson();

        }
        return view('admin.customers.index');
    }



    public function boleteria()
    {

        return view('admin.customers.boleteria');

    }

    public function buscarcedula(Request $request)
    {

      $customer = Customer::where('identification_card', (int)$request->input('identification_card'))->first();
    //dd($customer);
      if (!$customer) {
        // El customer no fue encontrado, muestra un mensaje personalizado
       // return response()->json(['message' => 'Customer NO encontrado'], 404);
        return redirect()->back()->with('message', 'Cliente no encontrado, verifique el número de cédula, sin puntos o comas');
    }else {
        //return response()->json(['message' => 'Customer encontrado'], 404);
        return redirect()->route('customer.show', ['customer' => $customer->id]);
    }
      //dd((int)$request->input('cedula'));
     // dd($customer);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Request $request)
    {
        //dd($customer->id);
        // $cliente =  Customer::findOrFail($customer->id)->with('tickets')->first();
        /*
         $cliente = Customer::select(['id','seller_id','name','last_name','identification_card'])
                    ->where('id',$customer->id)
                    ->with('tickets')
                    ->orderBy('id','desc');
                    */
        //$cliente =  Customer::select($customer->id)->with('tickets')->first();
       //dd($cliente);

       //dd($customer->id);


        $ticket = Ticket::select(['id','number_ticket','paid_ticket','status','updated_at'])
        ->where('customer_id', $customer->id)
        ->with(['payments', 'customers','lotteries'])
        ->orderBy('id', 'desc');
//dd($ticket);

        if ($request->ajax()){


            return datatables()->eloquent($ticket)
            //return datatables()->query($customers)
            ->editColumn('number_ticket', function (Ticket $ticket) {
                return  $ticket->number_ticket;
             })
             ->editColumn('paid_ticket', function (Ticket $ticket) {
                return  $ticket->paid_ticket;
             })
             ->editColumn('updated_at', function (Ticket $ticket) {
                return  $ticket->updated_at;
             })
             ->addColumn('sorteo', function (Ticket $ticket) {

               $loteriaId = Ticket::where('id', $ticket->id)->value('lottery_id');
               $loteria = Lottery::where('id',$loteriaId)->value('name');

                return $loteria ? $loteria : '';

             })
             ->addColumn('cliente',function (Ticket $ticket) {
                $customerId = Ticket::where('id', $ticket->id)->value('customer_id');
                $customer = Customer::where('id',$customerId)->value('name', 'last_name');
                //dd($customerId);
                return $customer;
             })
             ->toJson();

        }

        return view('admin.customers.show', compact('customer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
