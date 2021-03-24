<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('reserve',[$user]);
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
    {
        $request->validate(
            ['book_id'=>'required',
            'startdate'=>'required',
            'enddate'=>'required',]);
        $reservation =new Reservation();
        $reservation->book_id = request('book_id');
        $reservation->startDate = request('startdate');
        $reservation->endDate = request('enddate');
        $reservation->user_id = request('user_id');
        $reservation->comment = "";
        $reservation->status = "requested";

        $reservation->save();
        return redirect('reservations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
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
        $request->validate(
            ['book_id'=>'required',
            'startdate'=>'required|date',
            'enddate'=>'required|date|after:startdate',
            'status'=>'required'
            ]);
        $reservation->book_id = request('book_id');
        $reservation->startDate = request('startdate');
        $reservation->endDate = request('enddate');
        $reservation->user_id = request('user_id');
        $reservation->comment = request('comment');
        $reservation->status = request('status');

        $reservation->save();
        return redirect('reservations');
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
