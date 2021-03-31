<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
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

    {store();
         $notifications=DB::table('notifications')->where('user_id','=', Auth::user()->id)->where('status','=','unread')->get();
        
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
        if(Auth::user()->name=="admin"){
            $reservations=DB::table('reservations').where('endDate', '<=', date('Y-m-d') . ' 00:00:00')->where('status', '<>', 'returned')->get();
            foreach($reservations as $reservation){
                $notifications=DB::table('notifications').where('reservation_id','=',$reservation->id);
                if(count($notifications)==0){
                    $notification= new Notification();
                    $notification->user_id = Auth::user()->id;
                    $notification->status = "unread";
                    $notification->reservation_id=$reservation->id;
                    $notification->save();
                }
            }
            
        }
        else{
            $wishlists=DB::table('wishlists').where('user_id', '=',Auth::user()->id)->get();
        foreach($wishlists as $wishlist){
            $reservationFound = Reservation::where('book_id', '=', $wishlist->book_id)->where('endDate', '>=', date('Y-m-d') . ' 00:00:00')->where('status', '<>', 'returned')->get();
            if(count($reservationFound)==0){
            $notifications=DB::table('notifications').where('wishlist_id','=',$wishlist->id);
            if(count($notifications)==0){
                $notification= new Notification();
                $notification->user_id = Auth::user()->id;
                $notification->status = "unread";
                $notification->wishlist_id=$wishlist->id;
                $notification->save();
            }}
        }}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
