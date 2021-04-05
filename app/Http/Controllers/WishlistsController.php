<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistsController extends Controller
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
        $wishlistitems = DB::table('wishlists')->where('user_id', '=', Auth::user()->id)->join('books', 'wishlists.book_id', '=', 'books.id')->select('wishlists.id', 'wishlists.book_id', 'title', 'wishlists.user_id')->get();
        return view('wishlists.wishlists', ['wishlistitems' => $wishlistitems]);
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
        $wishlistcount = Wishlist::where('book_id', '=', request('book_id'))->where('user_id', '=', Auth::user()->id)->get();
        if (count($wishlistcount) == 0) {
            $wishlist = new Wishlist();
            $wishlist->book_id = request('book_id');
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
        }

        return redirect('reservations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //2
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect('wishlists');
    }
}
