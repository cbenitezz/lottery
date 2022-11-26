<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerRecords;
use App\Ticket;
use App\User;
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

       // $customers = Customer::select(DB::raw("select number_ticket from tickets where tickets.customer_id = customers.id"))->get();

       // DB::raw("select number_ticket from tickets where tickets.customer_id = customers.id")
        //dd($customers);
/*
        $prueba =  datatables()->eloquent($customers)
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
        ->editColumn('sector', function(Customer $customers) {
            return  $customers->sector;
         })
         ->editColumn('seller', function(Customer $customers) {
            return  $customers->seller_id;
         })->toJson();

        $seller = User::select('name')->where('id', 1)->first();
                //return  $seller;
         dd($seller->name);
         die();
*/




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
    public function show(Customer $customer)
    {
        //
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
