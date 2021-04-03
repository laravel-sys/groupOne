<?php

namespace App\Http\Controllers;

use App\Models\RoomBookings;
use Egulias\EmailValidator\Warning\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomBookingsController extends Controller
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
        $user = Auth::user();
        return view('rooms.index', ['bookings' => $user->room_bookings]);
    }
    public function indexAdmin()
    {
        $roomBookings = DB::table('room_bookings')->get();
        return view('rooms.indexAdmin', ['bookings' => $roomBookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = DB::table('rooms')->get();
        return view('rooms.bookRoomForm', ['rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'date' => 'required|date_format:Y-m-d|after:yesterday',
        //     'time' => 'required',
        //     'room_id' => 'required',
        // ]);
        $this->validate(
            $request,
            [
                'date' => 'required|date_format:Y-m-d|after:yesterday',
                'time' => 'required',
                'room_id' => 'required',
            ],
            [
                'date' => 'Cant select old date',
            ]
        );



        $check = DB::table('room_bookings')
            ->where('when_date', '=', request('date'))
            ->where('when_time', '=', request('time'))
            ->where('status', '=', 'booked')
            ->where('room_id', '=', (int) request('room_id'))
            ->get();

        $checkBooked = DB::table('room_bookings')
            ->where('status', '=', 'booked')
            ->where('user_id', '=', (int) Auth::user()->id)
            ->get();

        if (count($check) !== 0) {
            return redirect()->back()->with('alert', false)->with('message', 'The room is already booked in the sleceted time');
        }
        if (count($checkBooked) !== 0) {
            return redirect()->back()->with('alert', false)->with('message', 'you already booked a room');
        }

        $info = new RoomBookings();
        $info->when_date = request('date');
        $info->when_time = request('time');
        $info->user_id = Auth::user()->id;
        $info->room_id = request('room_id');
        $info->status = 'booked';
        $info->save();
        return redirect()->back()->with('alert', true);
        // return redirect()->route('roomsBooking.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomBookings  $roomBookings
     * @return \Illuminate\Http\Response
     */
    public function show(RoomBookings $roomBookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomBookings  $roomBookings
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomBookings $roomBookings)
    {
        // $rooms = DB::table('rooms')->get();
        // return view('rooms.edit', ['task' => $roomBookings, 'rooms' => $rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomBookings  $roomBookings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomBookings $roomBookings)
    {
        $roomBookings = RoomBookings::find($request->book_id);
        // dd($roomBookings);
        if (request('to') === 'cancel') {
            $roomBookings->status = 'canceled';
            $roomBookings->save();
            return redirect()->back();
        }
        if (request('to') === 'close') {
            $roomBookings->status = 'closed';
            $roomBookings->save();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomBookings  $roomBookings
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomBookings $roomBookings)
    {
        //
    }
}
