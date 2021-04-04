<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    {
        $this->store();
     $notifications=DB::table('notifications')->where('user_id','=', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();
       
     return ($notifications);
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
    public function store()
    {
        // $notifications=DB::table('notifications')->where('user_id','=',Auth::user()->id)->where('status','=','unread')->get();
        // foreach($notifications as $notification){
        //         DB::table('notifications')->where('id','=',$notification->id)->update(['status'=>"read"]);
        // }

        if(Auth::user()->name=="admin"){
            $contacts=DB::table('contacts')->get();
            foreach($contacts as $contact){
                $notifications=DB::table('notifications')->where('contact_id','=',$contact->id)->get();
                if(count($notifications)==0){
                    $notification= new Notification();
                    $notification->user_id = Auth::user()->id;
                    $notification->status = "unread";
                    $notification->contact_id=$contact->id;
                    $notification->url='/contacts';
                    $notification->message="new message from $contact->name";
                    $notification->save();
                }
            }
            
        }
        else{
            $reservations=DB::table('reservations')->where('user_id', '=',Auth::user()->id)->where('endDate', '<=', date('Y-m-d') . ' 00:00:00')->where('status', '=', 'checkout')->get();
            foreach($reservations as $reservation){
                $notifications=DB::table('notifications')->where('reservation_id','=',$reservation->id)->get();
                $book=DB::table('books')->where('id','=', $reservation->book_id)->first();
                if(count($notifications)==0){
                    $notification= new Notification();
                    $notification->user_id = Auth::user()->id;
                    $notification->status = "unread";
                    $notification->url='/reservations/checkout';
                    $notification->reservation_id=$reservation->id;
                    $notification->message="please return $book->title";
                    $notification->save();
                }
            }
            $wishlists=DB::table('wishlists')->where('user_id', '=',Auth::user()->id)->get();
        foreach($wishlists as $wishlist){
            $book=DB::table('books')->where('id','=', $wishlist->book_id)->first();
            $reservationFound = DB::table('reservations')->where('book_id', '=', $wishlist->book_id)->where('endDate', '>=', date('Y-m-d') . ' 00:00:00')->where('status', '<>', 'returned')->get();
            if(count($reservationFound)==0){
            $notifications=DB::table('notifications')->where('wishlist_id','=',$wishlist->id)->get();
            if(count($notifications)==0){
                $notification= new Notification();
                $notification->user_id = Auth::user()->id;
                $notification->status = "unread";
                $notification->url='/wishlists/wishlists';
                $notification->message=" The book  $book->title is currently available";
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

        
    }
    public function changeStatus(Request $request)
    {   $id= request('id');
        DB::table('notifications')->where('id','=',$id)->update(['status'=>"read"]);

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
