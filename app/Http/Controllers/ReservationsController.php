<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'hi';
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
        //
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
        $user = DB::table('users')->where('id', '=', $reservation->user_id)->get();
        // dd(reservation->id);
        return view('reservation.edit', ['reservation' => $reservation, 'user' => $user[0]->name]);
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
        // $input = request('endDate');
        // echo $input . '<br>';
        // $date = strtotime($input);
        // // echo $date;
        // // echo date("Y/m/d");
        // // dd(date('Y/m/d', $date) > date("Y/m/d"));
        // if (date('Y/m/d', $date) < date("Y/m/d")) {
        //     return redirect()->route('returnBook')->with('error', "Please, Select correct date");;
        // }

        $reservation->comment = request('comment');
        $reservation->endDate = new DateTime();
        $reservation->status = 'returned';
        $reservation->save();
        return redirect()->route('returnBook');
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


    public function returnBook(Request $req)
    {
        // dd($req->input('book_id'));
        $res = null;
        $old = '';
        if ($req->input('book_id') == null) {
            $res = DB::table('reservations')->where('status', '=',  'ongoing')->get();
            $old = '';
            // dd($req->input('book_id'));
        } else {
            $res = DB::table('reservations')->where('book_id', '=', (int) $req->input('book_id'))->where('status', '=',  'ongoing')->get();
            $old = $req->input('book_id');
            // dd((int) $req->input('book_id'));
            // dd($req->input('book_id'));
        }

        return view('reservation.returnBook', ['reservations' => $res, 'old' => $old]);
    }
    public function temp(Request $req)
    {
        $res = null;
        $old = '';
        if ($req->input('book_id') == null) {
            $res = DB::table('book')->get();
            $old = '';
        } else {
            // $res = DB::table('book')->where('title', '=', (int) $req->input('book_id'))->get();
            $res = DB::table('book')->where('title', 'like', '%' . $req->input('book_id') . '%')->get();
            $old = $req->input('book_id');
        }

        return view('welcome', ['books' => $res, 'old' => $old]);
    }
}
