<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;


class LotteryController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $lotteries = Lottery::select(['id','eslogan','name','sede','date_start','date_end','status'])->orderBy('date_end','desc')->get();
    $title = 'Sorteo';


    if(!$lotteries->count())
    {
      /* Sino hay rifa programada se debe crear una por default */
      return view('admin.lottery.create',compact('title'));


    }else{

        foreach ($lotteries as $lottery) {

            if($lottery->date_end <= Carbon::now()){
                /*
                    Esta instrucción actualiza el registro de la tabla lottery
                    pasando el atributo STATUS a 0, asi de manera automatica mediante
                    la fecha se controla los sorteos o rifas activas

                */
                 Lottery::where("id", $lottery->id)->update(["status" => 0]);

            }
        }

        return view('admin.lottery.index',compact('lotteries','title'));

    }

  }



  public function boleteria(Request $request, $id)
  {

   // $data = Ticket::select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->where('lottery_id',$lottery->id)->orderBy('id','asc')->toSql();
   // dd($data);
/*
    $data = DB::table('tickets')->select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->orderBy('id','asc')->get();
    dd($data);

    $products = Ticket::join('users','id', '=', 'user_id')->select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->get();
dd($products);*/
    $data = Ticket::select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->where('lottery_id',$id)->orderBy('id','asc');

  //  $data = Ticket::with('user','lottery')->select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->where('lottery_id',$id)->orderBy('id','asc');
    //$lottery = $data->lottery_id;
/*
    $buttom_abonar2 ='
    <buttom  name="abonar" id="abonar" class="abonar active btn btn-info btn-sm"
    data-toggle="modal" data-target="#modal-abono">
    <i class="fa fa-usd" aria-hidden="true"></i>&nbsp;Abonar
    </buttom>';

*/

    if($request->ajax()){



        // $data = DB::table('tickets')->select(['id', 'user_id','lottery_id','number_ticket','paid_ticket','status'])->orderBy('id','asc');
         // $data = DB::table('tickets');
        //  $data = DB::table('users');
/*
        DB::table('name')->select('column as column_alias')->get();
        $data = Ticket::select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')
                ->whereHas('profiles', function(Builder $query){
                    $query->select('name, 'last_name');
                })
                ->orderBy('id','asc');

        $posts = Post::whereHas('comments', function (Builder $query) {
            $query->where('content', 'like', 'code%');
        })->get();



*/
        //return DataTables::of($data)
       // return datatables()->query($data)
       // return datatables()->of($data)
        //return datatables($data)
       return datatables()->eloquent($data)

        ->editColumn('status', '@if($status == 0)
               <span class="label label-rouded label-warning ">
               <i class="fa fa-user-circle" aria-hidden="true"></i> Disponible</span>
               @else<span class="label label-rouded label-primary ">
               <i class="fa fa-handshake-o" aria-hidden="true"></i> Asignada</span> @endif')
        ->editColumn('lottery_id', function(Ticket $ticket) {
          return  '<span class="hide-menu">'.$ticket->lotteries->name.'
          <span class="label label-rouded label-warning ">'.$ticket->lotteries->id.'</span>
          </span>';})
        ->addColumn('action',function(Ticket $ticket){

                  $button = '<a href="/asignar/' .$ticket->id. '"  name="eliminar" id="'
                            .$ticket->id.'" class="active btn btn-primary btn-sm">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
                            Asignar</a>&nbsp;&nbsp;';
            if($ticket->status == 1){

                if($ticket->paid_ticket < 90000){

                    $button .= '<a href="/payment/"  name="eliminar" id="pago" class="active btn btn-primary btn-sm">
                              <i class="fa fa-usd" aria-hidden="true"></i>&nbsp;
                              Abonar</a>';
                }else{

                    $button .= '<buttom   class="disabled btn btn-default btn-sm">
                              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                              PAGADA
                              </buttom>';

                }
            }else{

                $button .= '<buttom   class="disabled btn btn-default btn-sm">
                              <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                              Asignar
                              </buttom>';
            }

             return $button;
          })->rawColumns(['action','status','lottery_id'])
        ->addColumn('user_id', function(Ticket $ticket) {
            return  $ticket->user->profile->name. ' '.$ticket->user->profile->last_name;
         })
         ->addColumn('identification', function(Ticket $ticket) {
            return  $ticket->user->profile->identification_card;
         })
         ->editColumn('paid_ticket', function(Ticket $ticket) {

            return  number_format($ticket->paid_ticket,0,',','.');
         })
         ->editColumn('lottery_identificador', function(Ticket $ticket) {
            return  $ticket->lotteries->id;
         })



        ->toJson();



    }

     return view('admin.lottery.boleteria', compact('id'));


  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $title = 'Sorteo';
    return view('admin.lottery.create',compact('title'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
//dd($request);
    /*
      Esta instrucción actualiza todos los registros de la tabla lottery
      pasando el atributo STATUS a 0, asi la ultima acción de registro
      quedará como la unica activa para su edición futura

    */
    //Lottery::query()->update(['status' => 0]);

    $validate = $this->validate($request,[
        'name'               =>'required|max:30',
        'nit'                =>'required|numeric|min:10',
        'eslogan'            =>'required|max:70',
        'representative'     =>'required|max:30',
        'sede'               =>'required|max:40',
        'address'            =>'required|max:80',
        'lottery'            =>'required|max:80',
        'commission_sale'    =>'required|numeric|min:11',
        'date_start'         =>'required|date|after:tomorrow|unique:lotteries',
        'date_end'           =>'required|date|after:date_start|unique:lotteries',
        'boletas'            =>'required',

    ]);

        $lottery = new Lottery;
        $lottery->eslogan = $request->eslogan;
        $lottery->nit = $request->nit;
        $lottery->name = $request->name;
        $lottery->representative = $request->representative;
        $lottery->date_start = $request->date_start;
        $lottery->date_end = $request->date_end;
        $lottery->ticket_value = $request->ticket_value;
        $lottery->lottery = $request->lottery;
        $lottery->commission_sale = $request->commission_sale;
        $lottery->address = $request->address;
        $lottery->sede = $request->sede;
        $lottery->status = 1;
        $lottery->save();

        $user = Auth::user();

        /* creamo el array numbers que permitirá la creación de los numeros
           en formato 0000 a 9999
        */
        $numbers = [];
        for($i = 0; $i <$request->boletas; $i++){

            $numbers[] = str_pad($i, 4, '0', STR_PAD_LEFT);
        }

        /*
         Preparamos el array data que contendrá todos los registros
         para su posterior inserción en la base de datos
        */
        for($i=0; $i<$request->boletas;$i++)
        {
            $data [] = [
                'user_id'       => $user->id,
                'customer_id'   => $user->id,
                'lottery_id'    => $lottery->id,
                'number_ticket' => $numbers[$i],
                'paid_ticket'   => 0,
            ];

        }

        /*
        (PHP 4 >= 4.2.0, PHP 5, PHP 7, PHP 8)
        array_chunk — Divide un array en fragmentos
        */
        $data_massive = array_chunk($data, 1000);

        if (isset($data_massive) && !empty($data_massive)) {

            foreach ($data_massive as $data_val) {
                DB::table('tickets')->insert($data_val);
            }
        }

        return redirect('/lottery');

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
