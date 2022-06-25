<?php

namespace App\Http\Controllers;

use App\Lottery;
use Illuminate\Http\Request;

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
    $title = 'Sorteo';

    if($lotteries->count()== 0)
    {
        return view('admin.lottery.create',compact('title'));

    }else{

        return view('admin.lottery.index',compact('lotteries','title'));
    }


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
    //dd($request);
    $validate = $this->validate($request,[
        'name'               =>'required|max:30',
        'nit'                =>'required|numeric|min:10',
        'eslogan'            =>'required|max:70',
        'representative'     =>'required|max:30',
        'city'               =>'required|max:40',
        'address'            =>'required|max:80',
        'lottery'            =>'required|max:80',
        'commission_sale'    =>'required|numeric|min:11',

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
