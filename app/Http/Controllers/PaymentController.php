<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    /*
     id:id, ticket id
     numero:numero, ticket number
     abono:abono
    */

    //dd($request);

    if($request->ajax()){

        //$payment = Payment::findOrFail($payment->ticket_id);
        $ticketReady = DB::table('Payments')->where('ticket_id',$request->id)->count();

        //dd($ticketReady);

        if($ticketReady == 0){

            $payment = new Payment;
            $payment->ticket_id    = $request->id;
            $payment->value        = $request->abono;
            $payment->date_payment = Carbon::now();
            $payment->save();

            $ticket = Ticket::find($request->id);
            $ticket->paid_ticket = $request->abono;
            $ticket->update();


            //$payment = Payment::find($ticketReady->id);
            //$ticketReady;
            //return response()->json(['data' => 'true' ]);

        }else{


/*
            $payment = Payment::select('ticket_id','value')->where('ticket_id',$request->id)->toSql();
            $payment->value        = $payment->value + $request->abono;
            $payment->date_payment = Carbon::now();
            $payment->update();*/

            $ticket = Ticket::find($request->id);
            $ticket->paid_ticket = $ticket->paid_ticket  + $request->abono;
            $ticket->update();

            $payment= Payment::where('ticket_id', $ticket->id)->first();
            $payment->value        = $ticket->paid_ticket;
            $payment->date_payment = Carbon::now();
            $payment->update();

        }



        //$request->numero;



        return response()->json(['data' => true]);
    }
    //return redirect()
    //return response()->json(['registro' => true ]);
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
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
