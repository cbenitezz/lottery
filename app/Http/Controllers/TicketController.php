<?php

namespace App\Http\Controllers;


use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class TicketController extends Controller
{


  public function asignar(Ticket $ticket)
  {

       $title = "Vendedor";
       $users = User::role(['vendedor','admin'])->simplepaginate(50);
       return view('admin.ticket.asignar', compact('users','title','ticket'));

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

      return redirect('admin/boleteria');



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
