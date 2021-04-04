<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
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
        if (Auth::user()->name !== 'admin') return view('welcome');

        return view('roomsAdminControl.index', ['rooms' => DB::table('rooms')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomsAdminControl.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'type' => 'required',
            'location' => 'required',
            'note' => 'required',
        ]);

        $room = new Room();
        $room->type = request('type');
        $room->location = request('location');
        $room->details = request('note');

        $room->save();
        return redirect()->route('rooms.index')
            ->with('alert', 'success')
            ->with('message', 'new room added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('roomsAdminControl.update', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        if (count(
            DB::table('room_bookings')
                ->where('room_id', '=', $room->id)
                ->whereIn('status', ['booked'] )
                ->get()
        ) !== 0) {
            return redirect()->back()
                ->with('alert', 'danger')
                ->with('message', 'cant update it, the room is booked');
        } else {
            request()->validate([
                'type' => 'required',
                'location' => 'required',
                'note' => 'required',
            ]);

            $room->type = request('type');
            $room->location = request('location');
            $room->details = request('note');

            $room->save();
            return redirect()->route('rooms.index')
                ->with('alert', 'success')
                ->with('message', 'room updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        if (count(DB::table('room_bookings')->where('room_id', '=', $room->id)->whereIn('status', ['booked'] )->get()) !== 0) {
            return redirect()->route('rooms.index')
                ->with('alert', 'danger')
                ->with('message', 'cant remove it, the room is in use');
        } else {
            $room->delete();
            return redirect()->route('rooms.index')
                ->with('alert', 'success')
                ->with('message', 'room deleted');
        }
    }
}
