<?php

namespace App\Http\Controllers;

use App\Customer;
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

        //$title = "Clientes";
       // $customers = Customer::select(['id','seller_id','ticket_id','identification_card','name','last_name','phone'])->orderBy('id','asc');

      // $customers = Customer::with(['tickets','users'])->select(['id','seller_id','ticket_id','identification_card','name','last_name','phone'])->orderBy('id','asc');

        $customers = Customer::select(['id','seller_id','ticket_id','identification_card','name','last_name','phone'])
                              ->with(['tickets'=>function($query){
                                $query->select('id','number_ticket','paid_ticket as abono');
                              },'users'=>function($query){
                                $query->select('id','name as seller');
                              }])
                              ->orderBy('id','asc');

        /*
        $user = User::select("id", "name")
        ->with(['positions' => function ($query) {
            $query->select('name');
        }, 'profile' => function ($query) {
            $query->select("user_id", "company_name");
        }])->get();

        */

       // $customers = DB::table('customers')->select(['id','seller_id','ticket_id','identification_card','name','last_name','phone'])->orderBy('id','asc');
        //return datatables()->query(DB::table('users'))->toJson();
       // return view('admin.customers.index',compact('customers', 'title'));

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
             ->addColumn('number_ticket', function(Customer $customers) {
                return  $customers->tickets->number_ticket;
             })
             /*
             ->filterColumn('number_ticket', function($customers) {
                return  $customers->tickets->abono;
            })*/
             ->addColumn('abono', function(Customer $customers) {
                return  $customers->tickets->abono;
             })
             ->addColumn('seller', function(Customer $customers) {
                return  $customers->users->seller;
             })->toJson();

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
