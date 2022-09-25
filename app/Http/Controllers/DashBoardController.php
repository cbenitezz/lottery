<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Lottery;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $lotteries = Lottery::count();
        $lotteryActive = Lottery::where('status',1)->count();
        $customer = Customer::count();
        $seller = User::role(['vendedor'])->count();
        $lotteriesTicket = Lottery::with('tickets')->get();
        $paidTicketTotal = Ticket::sum('paid_ticket');
       // $bestSellers = Ticket::with('users')->groupBy('user_id')->selectRaw('sum(paid_ticket) as sum, user_id')->orderBy('sum','DESC')->pluck('sum','user_id');
        $bestSellers = Db::table('tickets')
                        ->join('users','users.id','=','tickets.user_id')
                        ->select('users.name','user_id',DB::raw('sum(paid_ticket) as sum'))
                        ->groupBy('users.name','user_id')
                        ->orderBy('sum','DESC')
                        ->pluck('sum','users.name');
//dd($bestSellers);
        //$lotteriesCount = Lottery

        return view('layouts.dashboard.index', compact('lotteries', 'lotteryActive','customer','seller','lotteriesTicket','paidTicketTotal','bestSellers'));
    }
}
