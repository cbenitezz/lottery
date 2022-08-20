<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerRecords;
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


        $customers = CustomerRecords::select(['id','identification_card','name','last_name','phone','number_ticket','abono','seller'])->orderBy('id','asc');

        if($request->ajax()){


            return datatables()->eloquent($customers)
            //return datatables()->query($customers)
            ->editColumn('name', function(CustomerRecords $customers) {
                return  $customers->name;
             })
             ->editColumn('last_name', function(CustomerRecords $customers) {
                return  $customers->last_name;
             })
             ->editColumn('identification_card', function(CustomerRecords $customers) {
                return  $customers->identification_card;
             })
             ->editColumn('phone', function(CustomerRecords $customers) {
                return  $customers->phone;
             })
             ->editColumn('number_ticket', function(CustomerRecords $customers) {
                return  $customers->number_ticket;
             })
            ->editColumn('abono', function(CustomerRecords $customers) {
                return  $customers->abono;
             })
             ->editColumn('seller', function(CustomerRecords $customers) {
                return  $customers->seller;
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
