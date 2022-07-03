<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\Ticket;
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
    //$data = Lottery::select('id','eslogan','name','date_start','date_end','status')->orderBy('date_end','desc')->get();
    //$data = Ticket::all();
   // dd($data);
    if($request->ajax()){

        $data = Ticket::select('id','user_id','lottery_id','number_ticket','paid_ticket')->orderBy('id','asc');

        //$data = Ticket::all();
       // dd($data);
        return datatables()->eloquent($data)
        ->addColumn('action',function($data){
            $button = '<a name="edit" href="'. route("profile.update",$data->id).' " id="'.$data->id.'"
                class="edit btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                Editar</a>&nbsp;&nbsp;';
            $button .= '<a data-remote="/profile/create/' .$data->id . '"  name="eliminar" id="'
               .$data->id.'" class="btn-delete btn btn-danger btn-sm">
               <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;
               Eliminar</a>';
             return $button;
          })->rawColumns(['action'])
        ->editColumn('user_id', '{{$id}}')
        ->editColumn('user_id', function(Ticket $ticket) {
            return  $ticket->user->name . '!';
        })
        ->editColumn('sorteo', function(Ticket $ticket) {
            return  $ticket->lotteries . '!';
        })
        ->toJson();
       // return DataTables::of($data)->make(true);


    }

    //return Datatables::of(Ticket::query())->make(true);

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
