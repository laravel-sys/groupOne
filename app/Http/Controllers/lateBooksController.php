<?php

namespace App\Http\Controllers;

use App\Models\lateBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class lateBooksController extends Controller
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
        $lateBooks = lateBooks::all();
        return view('lateBooks', ['lateBooks' => $lateBooks]);
    }

    public function getLateBooks()
    {
        $lateBooks1 = DB::table('late_books')
            ->join('users', 'users.id', '=', 'late_books.user_id')
            ->join('books', 'books.id', '=', 'late_books.book_id')
            ->select('late_books.id as id', 'books.id as book_id','users.id as user_id','late_books.fees as fees', 'late_books.endDate as endDate', 'late_books.status as status')
            ->where('late_books.user_id', '=', Auth::user()->id)
            ->where('late_books.status', '<>', 'paid')
            ->get();
        if (count($lateBooks1) != 0) {
            $lateBooks = DB::table('reservations')
                ->join('users', 'users.id', '=', 'reservations.user_id')
                ->join('books', 'books.id', '=', 'reservations.book_id')
                ->select('books.*', 'reservations.*')
                ->where('reservations.status', '=', 'checkout')
                ->where('endDate', '<', date('Y-m-d'))
                ->get();
            return view('lateBooks', ['lateBooks' => $lateBooks]);
        }        
         return view('lateBooks', ['lateBooks' => $lateBooks1]);
    }

    public function getPaidBooks()
    {
        $paidBooks = DB::table('late_books')
            ->join('users', 'users.id', '=', 'late_books.user_id')
            ->join('books', 'books.id', '=', 'late_books.book_id')
            ->select('books.*', 'late_books.*')
            ->where('late_books.user_id', '=', Auth::user()->id)
            ->where('late_books.status', '=', 'paid')
            ->get();


        return view('paidBooks', ['paidBooks' => $paidBooks]);
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
        $lateBookFound = lateBooks::where('book_id', '=', request('book_id'))->where('book_id', '=', Auth::user()->id)->where('endDate', '<', date('Y-m-d') . ' 00:00:00')->where('status', '<>', 'paid')->get();
        if (count($lateBookFound) == 0) {
            $lateBook = new lateBooks();
            $lateBook->book_id = request('book_id');
            $lateBook->user_id = Auth::user()->id;
            $lateBook->endDate = request('endDate');
            $lateBook->fees = 10;
            $lateBook->status = "paid";
            $lateBook->save();
            return redirect()->back()->with('success', true);
        }
        return redirect()->back()->with('success', false);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lateBooks  $lateBooks
     * @return \Illuminate\Http\Response
     */
    public function show(lateBooks $lateBooks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lateBooks  $lateBooks
     * @return \Illuminate\Http\Response
     */
    public function edit(lateBooks $lateBooks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lateBooks  $lateBooks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lateBooks $lateBooks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lateBooks  $lateBooks
     * @return \Illuminate\Http\Response
     */
    public function destroy(lateBooks $lateBooks)
    {
        //
    }
}
