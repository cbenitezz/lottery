<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\Payment;
use App\Receipt;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

    $lotteries = Lottery::pluck('name','id');
    //dd($lotteries);
    return view('admin.payments.index', compact('lotteries'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

   public function temporal(Request $request)
   {




   }

   public function printer(Request $request)
   {

    $get_array = json_decode($request->array_table, true);
    $usuario   = $request->usuario;

    $pdf = Pdf::loadView('admin.payments.recibo',$get_array);
        return $pdf->download('invoice.pdf');

    if($request->ajax()){



        //return response()->json(['data'=>true, 'array'=>$get_array]);
    }




   }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    /*
        lottery_id:lottery_id,
        boleta:boleta,
        talonario:talonario,
        valor:valor,
        usuario:usuario,

    */


    if($request->ajax()){

            $seller = Ticket::select('id','user_id')
                        ->where('number_ticket',$request->boleta)
                        ->where('lottery_id',$request->lottery_id)
                        ->first();

            $vendedor = $seller->user->profile->name
            .' '.$seller->user->profile->last_name;

            $datos = [
                    'lottery' => $request->lottery_id,
                    'boleta' =>$request->boleta,
                    'talonario'=>$request->talonario,
                    'valor' =>$request->valor,
                    'usuario'=>$request->usuario,
                    'seller'=>$vendedor,
                    ];
            // obtener el ID del ticket conociendo de antemano el numero de la Boleta
            // ademas el identificador de la loteria complementa la solicitud


           // $this->receipts($datos);
           $receipts = Receipt::create([

            "cashierer" => $datos['seller'],
            "ticket"    => $datos['boleta'],
            "payment"   => $datos['valor'],
            "checkbook" => $datos['talonario'],
             ]);



            if(!$id_ticket = Ticket::select('id')
                ->where('number_ticket',$request->boleta)
                ->where('lottery_id',$request->lottery_id)
                ->first()){

                 return response()->json(['data' => null ]);
            }
            // En la table lotteries se inicializa el contador de recibo y talonario en 00000
            // desde ahi se incrementa en la tabla payments
            $rt_lottery  = Lottery::find($request->lottery_id)->select('id','recibo')->first();
            $ticketReady = DB::table('Payments')->where('ticket_id',$id_ticket->id)->count();
            //***Instancia del modelo TICKET */
            $ticket = Ticket::find($id_ticket->id);
            //***Instancia del Modelo Lottery */
            $lottery = Lottery::find($ticket->lottery_id);




        if($ticketReady == 0){

            // $ticketReady permite conocer si en la tabla payments hay un registro
            // con el ticket id, si es 0 indica que será un regitro nuevo
            // de lo contrario se va a la opción de actualización
            //return response()->json(['data' => $id_ticket->id ]);
            $payment = new Payment;
            $payment->ticket_id    = $id_ticket->id;
            $payment->value        = $request->valor;
            $payment->recibo       = str_pad($rt_lottery->recibo +1,5,'0',STR_PAD_LEFT);
            $payment->talonario    = $request->talonario;
            $payment->date_payment = Carbon::now();
            $payment->save();

            $ticket->paid_ticket = $request->valor;
            $ticket->update();

            $lottery->talonario = $payment->talonario;
            $lottery->recibo    = $payment->recibo;
            $lottery->update();


           //return response()->json(['data' => true, 'ticket'=> $ticketReady  ]);
           return response()->json(['data'=>true, 'array'=>$datos]);

        }else{


            $payment = Payment::select('id','ticket_id','value','recibo','talonario')
                     ->where('ticket_id',$id_ticket->id)->first();

            $payment->value = $payment->value + $request->valor;
                if($payment->value<= $lottery->ticket_value){

                    $payment->recibo       = str_pad($rt_lottery->recibo +1,5,'0',STR_PAD_LEFT);
                    $payment->talonario    = $request->talonario;
                    $payment->date_payment = Carbon::now();
                    $payment->update();

                    $ticket->paid_ticket = $payment->value;
                    $ticket->update();

                }else{
                    return response()->json(['data' => 'pagada' ]);
                }


/*
            $payment= Payment::where('ticket_id', $id_ticket)->first();
            $payment->value        = $ticket->paid_ticket;
            $payment->date_payment = Carbon::now();
            $payment->update();*/
           // return response()->json(['data' => $ticketReady ]);




            return response()->json(['data'=>true, 'array'=>$datos]);

        }

       // return response()->json(['data' => true, 'array'=>$datos]);
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
