<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\Payment;
use App\Profile;
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
    foreach ($lotteries as $key => $value) {
        $lottoId = $key;
    }

    return view('admin.payments.index', compact('lotteries','lottoId'));

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


    if($request->ajax()){


        $registro = json_decode($request->array_table);
        $request->usuario_seller;
        $request->lottery;

        $vendedor = $request->usuario_seller_cc;

        $lottery = Lottery::findOrFail($request->lottery)->first();
        $recibo = $registro[0][1];
        $abonoTotal=0;
        foreach ($registro as $key => $value) {
            $abonoTotal += intval(substr($value[2],1));
        }

       // dd($request->array_table);

        $data = [
            'cajero'         =>  $request->usuario_cajero,
            'recibo'         =>  $recibo,
            'fecha'          =>  Carbon::now(),
            'cedula'         =>  $vendedor,
            'nombreVendedor' =>  $request->usuario_seller,
            'abono'          =>  $abonoTotal,
            'nit'            =>  $lottery->nit,
            'sede'           =>  $lottery->sede,
            'loteria'        =>  $lottery->lottery,

        ];

        $filePdf = 'ticket-'.time().'.pdf';
        $pdf = Pdf::loadView('admin.payments.recibo',$data);
        $pdf->setPaper('a7', 'portrait');
        $pdf->save(storage_path('app/public/').$filePdf);

            //return $pdf->download('ticket.pdf');
            //return $pdf->stream('ticket.pdf');
        return response()->json(['data'=>true, 'filePdf'=>$filePdf, 'arreglo'=>$vendedor, 'ticket'=>$registro[0][1] ]);
    }

   }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    if($request->ajax()){

            $seller = Ticket::select('id','user_id')
                        ->where('number_ticket',$request->boleta)
                        ->where('lottery_id',$request->lottery_id)
                        ->first();

            /* seller */
            $vendedor = $seller->user->profile->name
            .' '.$seller->user->profile->last_name;

            $vendedorCc = $seller->user->profile->identification_card;

            $query = Lottery::select('ticket_value')->where('id',$request->lottery_id )->first();
            $saldo = $query->ticket_value-$request->valor;

            $datos = [
                    'lottery' => $request->lottery_id,
                    'boleta' =>$request->boleta,
                    'talonario'=>$request->talonario,
                    'valor' =>$request->valor,
                    'usuario_cajero'=>$request->usuario_cajero,
                    'seller'=>$vendedor,
                    'vendedorCc' =>$vendedorCc,
                    'saldo' =>$saldo,
                    ];
            // obtener el ID del ticket conociendo de antemano el numero de la Boleta
            // ademas el identificador de la loteria complementa la solicitud
            // var_dump($datos['lottery']);




            Receipt::create([

            "lottery_id"=> $datos['lottery'],
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

                    $datos['saldo'] = $lottery->ticket_value - $payment->value;

                }else{
                    return response()->json(['data' => 'pagada' ]);
                }


            return response()->json(['data'=>true, 'array'=>$datos]);
        }

    }

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
