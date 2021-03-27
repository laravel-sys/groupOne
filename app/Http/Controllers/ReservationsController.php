<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationsController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth',['expect'=>['reserve', ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->name=="admin"){
            $reservedBooks=Reservation::all();
            return view('reservedbooks',['reservedBooks'=>$reservedBooks]);
        }
        else{
            $books=\DB::table('book')->get();
            return view('reserve',['books'=>$books]);
        }
            
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $reservationFound=Reservation::where('book_id','=', request('book_id'))->where('endDate','>=', date('Y-m-d').' 00:00:00')->get();
        if(count($reservationFound)==0){
            $reservation =new Reservation();
            $reservation->book_id = request('book_id');
            $reservation->endDate = Carbon::tomorrow();
            $reservation->user_id = request('user_id');
            $reservation->status = "requested";
            $reservation->save();
            return redirect()->back()->with('success', 'please checkout your book within 24 hours');

        }
        return redirect()->back()->with('success', 'This book is currently reserved by another user');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
       
        $reservation->book_id = request('book_id');
        $reservation->startDate = Carbon::today();
        $reservation->endDate = Carbon::now()->addDays(15);
        $reservation->user_id = request('user_id');
        $reservation->status =  request('status');

        $reservation->save();
        return redirect('reserve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
