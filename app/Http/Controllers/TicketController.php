<?php

namespace App\Http\Controllers;


use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class TicketController extends Controller
{


  public $ticket;
  public $ticket_url;

  public function asignar(Ticket $ticket, Request $request)
  {

      $data = User::role(['vendedor','admin']);


      $this->ticket = $ticket;
      $this->ticket_url ="/ticket";
      $lottery_id = $ticket->lottery_id;

      if($request->ajax()){

       // $data = Ticket::select('id', 'user_id','lottery_id','number_ticket','paid_ticket','status')->orderBy('id','asc');
        $data = User::role(['vendedor','admin']);

        return datatables()->eloquent($data)

         ->addColumn('action',function($data){
                $button =  '<form method="POST" action="'.$this->ticket_url.'">
                            <input type="hidden" name="_token" value="'. @csrf_token().'">
                            <input type="hidden" name="name" value="'.$this->ticket->number_ticket.'">
                            <input type="hidden" name="lottery_id"   value="'.$this->ticket->lottery_id.'">
                            <input type="hidden" name="id"   value="'.$this->ticket->id.'">
                            <input type="hidden" name="user_id"   value="'.$data->id.'">
                            <input type="submit" class="btn btn-primary" value="# '.$this->ticket->number_ticket.'">
                            </form>';
             return $button;
          })->rawColumns(['action'])
        ->addColumn('boletas', function($data) {
            return  $data->tickets()->count();
        })
        ->addColumn('phone',function($data){
            return $data->profile->phone;
        })
        ->editColumn('name', function($data){
            return $data->profile->name .' '.$data->profile->last_name;
        })
        ->addColumn('identification_card', function($data){
            return $data->profile->identification_card;
        })
         ->toJson();

           }

     return view('admin.ticket.asignar_datatable',compact('lottery_id'));


  }



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

      //dd($request);
      $ticket = Ticket::findOrFail($request->id);
      $ticket->user_id = $request->user_id;
      $ticket->status = 1;
      $ticket->update();

//dd($ticket->lottery_id);

      return redirect('admin/boleteria/'.$ticket->lottery_id);



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
