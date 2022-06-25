<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $lotteries = Lottery::select(['id','eslogan','name','date_start','date_end','status'])->get();
    //$lotteries = Lottery::all();
   // dd($lotteries);
    $title = 'Sorteo';
    //if ($lotteries->first()) {{{ dd('hola'); }}}

//if (!$lotteries->isEmpty()) {{{ dd('hola'); }}}

//if ($lotteries->count()) {{{ dd('hola'); }}}

//if (count($lotteries)) {{{ dd('hola'); }}}

//if ($lotteries->isNotEmpty()) {{{ dd('hola'); }}}


    if(!$lotteries->count())
    {

      return view('admin.lottery.create',compact('title'));
      {{{ dd('si no tiene'); }}}

    }else{

        return view('admin.lottery.index',compact('lotteries','title'));
        {{{ dd('tiene'); }}}
    }


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
        $lottery->save();

        $user = Auth::user();
        /*
        for($i=0; $i<=$request->boletas;$i++)
        {
            $ticket = new Ticket;
            $ticket->user_id = $user->id;
            $ticket->lottery_id = $lottery->id;
            $ticket->number_ticket = $i;
            $ticket->paid_ticket = 0;
            $ticket->save();
        }*/

        for($i=0; $i<=$request->boletas;$i++)
        {
            $data [] = [
                'user_id'       => $user->id,
                'lottery_id'    => $lottery->id,
                'number_ticket' => $i,
                'paid_ticket'   => 0,
            ];

        }
        $chunk_data = array_chunk($data, 1000);

        if (isset($chunk_data) && !empty($chunk_data)) {
        foreach ($chunk_data as $chunk_data_val) {
            //var_dump($chunk_data_val);
            DB::table('tickets')->insert($chunk_data_val);
        }
        }

//dd($data);

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
