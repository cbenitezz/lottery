<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\Ticket;
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
    $lotteries = Lottery::select(['id','eslogan','name','date_start','date_end','status'])->orderBy('date_end','desc')->get();
    $title = 'Sorteo';


    if(!$lotteries->count())
    {

      return view('admin.lottery.create',compact('title'));
      {{{ dd('si no tiene'); }}}

    }else{

        return view('admin.lottery.index',compact('lotteries','title'));
        {{{ dd('tiene'); }}}
    }


  }

  public function boleteria(Request $request)
  {

/*
    $products = Ticket::join('users','id', '=', 'user_id')->select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->get();
dd($products);*/
    if($request->ajax()){

        $data = Ticket::select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->orderBy('id','asc');
/*
        $data = Ticket::select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')
                ->whereHas('profiles', function(Builder $query){
                    $query->select('name, 'last_name');
                })
                ->orderBy('id','asc');

        $posts = Post::whereHas('comments', function (Builder $query) {
            $query->where('content', 'like', 'code%');
        })->get();



*/

        return datatables()->eloquent($data)

        ->editColumn('status', '@if($status == 0)
               <span class="label label-rouded label-warning ">
               <i class="fa fa-user-circle" aria-hidden="true"></i> Disponible</span>
               @else<span class="label label-rouded label-primary ">
               <i class="fa fa-handshake-o" aria-hidden="true"></i> Asignada</span> @endif')
         ->addColumn('action',function($data){
            $button = '<a href="/asignar/' .$data->id . '"  name="eliminar" id="'
                .$data->id.'" class="active btn btn-primary btn-sm">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
                Asignar</a>&nbsp;&nbsp;';
            $button .= '<a data-remote="/profile/create/' .$data->id . '"  name="eliminar" id="'
               .$data->id.'" class="active btn btn-info btn-sm">
                <i class="fa fa-usd" aria-hidden="true"></i>&nbsp;
               Abonar</a>';
             return $button;
          })->rawColumns(['action','status'])

        ->editColumn('lottery_id', function(Ticket $ticket) {
            return  $ticket->lotteries->name;
         })
        ->addColumn('user_id', function(Ticket $ticket) {
            return  $ticket->user->profile->name. ' '.$ticket->user->profile->last_name;
         })
         //->filterColumn('user_id','where', "like", ["%$keyword%"])


        ->toJson();



    }

     return view('admin.lottery.boleteria');


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

    /*
      Esta instrucción actualiza todos los registros de la tabla lottery
      pasando el atributo STATUS a 0, asi la ultima acción de registro
      quedará como la unica activa para su edición futura

    */
    Lottery::query()->update(['status' => 0]);

    $validate = $this->validate($request,[
        'name'               =>'required|max:30',
        'nit'                =>'required|numeric|min:10',
        'eslogan'            =>'required|max:70',
        'representative'     =>'required|max:30',
        'city'               =>'required|max:40',
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
        $lottery->city = $request->city;
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
