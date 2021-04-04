<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Book;
use App\User;

use App\Models\Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $rate = round(DB::table('rates')
            ->where('book_id', $id)
            ->avg('rate') !== null ? DB::table('rates')
            ->where('book_id', $id)
            ->where('rate', '!=', 0)
            ->avg('rate'):0);

           return view (
               'User.ratepage',
               [
                   'rate' => $rates,
                   'user' => $user
               ]
            );
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
        $validateData = $request->validate([
            'comment' => 'required_without:rate|max:250',
        ],
    [
        'comment.required_without' => 
        'please leave a comment or rate our book. "Appreciate if you do both :) "'
    ]);
        $book_id = $request->id;
        $comment = $request->comment;
        $table_rate = DB::table('rates')->where('Book_id', $book_id)->where('user_id', Auth::id())
        ->where('user_id', Auth::id())->where('comment', null)->exists();

        if($request->rate ==0 && $table_rate)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function show(Rates $rates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function edit(Rates $rates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rates $rates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rates $rates)
    {
        //
    }
}
