<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                ''
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->name != "admin") {
            return redirect('books');
        }
        $reservedBooks = Reservation::all();
        return view('reservedbooks', ['reservedBooks' => $reservedBooks]);
    }

    public function getUserCheckedOut()
    {
        // $checkoutList = Reservation::all()->where('status', '=', 'checkout');
        $checkoutList = DB::table('reservations')
            ->join('users', 'users.id', '=', 'reservations.user_id')
            ->join('books', 'books.id', '=', 'reservations.book_id')
            ->select('books.*', 'reservations.*')
            ->where('reservations.user_id', '=', Auth::user()->id)
            ->where('reservations.status', '=', 'checkout')
            ->get();
            
        return view('reservation.checkedout', ['checkoutList' => $checkoutList]);
    }

    public function getReturnedBooks()
    {
        // $history = Reservation::all()->where('status', '=', 'returned');
        $history = DB::table('reservations')
            ->join('users', 'users.id', '=', 'reservations.user_id')
            ->join('books', 'books.id', '=', 'reservations.book_id')
            ->select('books.*', 'reservations.*')
            ->where('reservations.user_id', '=', Auth::user()->id)
            ->where('reservations.status', '=', 'returned')
            ->get();

        // dd($checkoutList);
        return view('reservation.history', ['history' => $history]);
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
        $reservationFound = Reservation::where('book_id', '=', request('book_id'))->where('endDate', '>=', date('Y-m-d') . ' 00:00:00')->where('status', '<>', 'returned')->get();
        if (count($reservationFound) == 0) {
            $reservation = new Reservation();
            $reservation->book_id = request('book_id');
            $reservation->endDate = Carbon::tomorrow();
            $reservation->user_id = Auth::user()->id;
            $reservation->status = "requested";
            $reservation->save();
            // return redirect()->back()->with('success', 'please checkout your book within 24 hours');
            return redirect()->back()->with('success', true);
        }
        return redirect()->back()->with('success', false);
        // return redirect()->back()->with('success', 'This book is currently reserved by another user');
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

        if (request('from') === 'edit') {
            $reservation->comment = request('comment');
            $reservation->endDate = new DateTime();
            $reservation->status = 'returned';
            $reservation->save();
            return redirect()->route('returnBook');
        } else {
            $reservation->book_id = request('book_id');
            $reservation->startDate = Carbon::today();
            $reservation->endDate = Carbon::now()->addDays(15);
            $reservation->user_id = request('user_id');
            $reservation->status =  request('status');

            $reservation->save();
            return redirect('reservations');
        }
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
        if (Auth::user()->name != "admin") {
            return redirect('books');
        }
        $res = null;
        $old = '';
        if ($req->input('book_id') == null) {
            $res = DB::table('reservations')->where('status', '=',  'checkout')->get();
            $old = '';
            // dd($req->input('book_id'));
        } else {
            $res = DB::table('reservations')->where('book_id', '=', (int) $req->input('book_id'))->where('status', '=',  'checkout')->get();
            $old = $req->input('book_id');
            // dd((int) $req->input('book_id'));
            // dd($req->input('book_id'));
        }

        return view('reservation.returnBook', ['reservations' => $res, 'old' => $old]);
    }
    // public function temp(Request $req)
    // {
    //     $res = null;
    //     $old = '';
    //     if ($req->input('book_id') == null) {
    //         $res = DB::table('book')->get();
    //         $old = '';
    //     } else {
    //         // $res = DB::table('book')->where('title', '=', (int) $req->input('book_id'))->get();
    //         $res = DB::table('book')->where('title', 'like', '%' . $req->input('book_id') . '%')->get();
    //         $old = $req->input('book_id');
    //     }

    //     return view('welcome', ['books' => $res, 'old' => $old]);
    // }
}
