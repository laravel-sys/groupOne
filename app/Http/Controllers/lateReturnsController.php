<?php

namespace App\Http\Controllers;

use App\Models\lateReturns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class lateReturnsController extends Controller
{
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
        $lateReturns = lateReturns::all();
        return view('lateReturns', ['lateReturns' => $lateReturns]);
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

        // $query = \DB::connection()->getPdo()->query("select user_id,book_id from reservations where book_id =" + );
        // $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        // \DB::table('winners')->insert($data);
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lateReturns  $lateReturns
     * @return \Illuminate\Http\Response
     */
    public function show(lateReturns $lateReturns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lateReturns  $lateReturns
     * @return \Illuminate\Http\Response
     */
    public function edit(lateReturns $lateReturns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lateReturns  $lateReturns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lateReturns $lateReturns)
    {

        $item = DB::table('late_returns')->where('id', '=', (int) $request->input('id'))->get();

        if (request('from') === 'edit') {

            $item->reservation_id = request('reservation_id');
            $item->user_id = request('user_id');
            $item->book_id = request('book_id');
            $item->fees = request('fees');
            $item->status = "paid";
            $lateReturns = $item;
            DB::table('late_returns')
                ->where('id', (int) $request->input('id'))
                ->update(['status' => "paid"]);

            return redirect()->route('adminLateReturns');
        } else {
            $lateReturns->reservation_id = request('reservation_id');
            $lateReturns->fees = request('fees');
            $lateReturns->status = "paid";
            $lateReturns->save();
            return redirect('adminLateReturns');
        }
    }


    public function userLateReturns()
    {

        // check if there r late books
        $lateReturns = DB::table('reservations')
            ->join('users', 'users.id', '=', 'reservations.user_id')
            ->join('books', 'books.id', '=', 'reservations.book_id')
            ->select('books.*', 'reservations.*')
            ->where('reservations.user_id', '=', Auth::user()->id)
            ->where('reservations.endDate', '<', date('Y-m-d') . ' 00:00:00')
            ->where('reservations.status', '=', 'checkout')
            ->get();
        $userLateReturns = DB::table('late_returns')
            ->join('users', 'users.id', '=', 'late_returns.user_id')
            ->join('books', 'books.id', '=', 'late_returns.book_id')
            ->join('reservations', 'reservations.id', '=', 'late_returns.reservation_id')
            ->select('users.*', 'books.*', 'reservations.*', 'late_returns.*')
            ->where('late_returns.user_id', '=', Auth::user()->id)
            // ->where('reservations', 'reservations.id', '=', 'late_returns.reservation_id')
            ->where('late_returns.status', '=', 'unpaid')
            ->get();
        foreach ($lateReturns as $data) {
            $check = DB::table('late_returns')->where('reservation_id', '=', $data->id)->get();
            if(count($check) == 0){
                DB::table('late_returns')->insert(['user_id' => $data->user_id, 'book_id' => $data->book_id, 'reservation_id' => $data->id,  'fees' => 0, 'status' => 'unpaid']);
            }
            // if ($userLateReturns->reservation_id == $data->id) {
                // DB::table('late_returns')->insert(['user_id' => $data->user_id, 'book_id' => $data->book_id, 'reservation_id' => $data->id,  'fees' => 0, 'status' => 'unpaid']);
            // }
        }
        return view('lateReturns.userLateReturns', ['userLateReturns' => $userLateReturns]);
    }

    public function adminLateReturns()
    {
        $adminLateReturns = DB::table('late_returns')
            ->join('users', 'users.id', '=', 'late_returns.user_id')
            ->join('books', 'books.id', '=', 'late_returns.book_id')
            ->join('reservations', 'reservations.id', '=', 'late_returns.reservation_id')
            ->select('users.*', 'books.*', 'reservations.*', 'late_returns.*')
            ->where('late_returns.status', '=', 'unpaid')
            ->get();

        return view('lateReturns.adminLateReturns', ['adminLateReturns' => $adminLateReturns]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lateReturns  $lateReturns
     * @return \Illuminate\Http\Response
     */
    public function destroy(lateReturns $lateReturns)
    {
        //
    }
}
