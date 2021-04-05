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
        // $user = Auth::id();
        // $rate = round(DB::table('rates')
        //     ->where('book_id', $id)
        //     ->avg('rate') !== null ? DB::table('rates')
        //     ->where('book_id', $id)
        //     ->where('rate', '!=', 0)
        //     ->avg('rate'):0);

        //    return view (
        //        'User.ratepage',
        //        [
        //            'rate' => $rates,
        //            'user' => $user
        //        ]
        //     );
        return view('User.ratePage');
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
    //     $validateData = $request->validate([
    //         'comment' => 'required_without:rate|max:250',
    //     ],
    // [
    //     'comment.required_without' => 
    //     'please leave a comment or rate our book. "Appreciate if you do both :) "'
    // ]);
    //     $book_id = $request->id;
    //     $comment = $request->comment;
    //     $table_rate = DB::table('rates')->where('Book_id', $book_id)->where('user_id', Auth::id())
    //     ->where('user_id', Auth::id())->where('comment', null)->exists();

    //     if($request->rate ==0 && $table_rate->exists() == true) {
    //         $rate = $table_rate->get()[0]->rate;
    //     }
    //     else{
    //         $rate = $request->rate;
    //     }

    //     if($table_comment == false && $table_rate->exists() == false || $table_comment == true 
    //     && $comment != '' || $table_comment == false && $comment != ''){
    //         \App\User::find(Auth::id())->rates()
    //         ->attach([$book_id => ['rate'=>$rate ,
    //                                 'comment' => $comment,
    //                                 'created_at => Carbon::now()']]);
    //     }

    //     if($table_rate->exists() == true ){
    //         $rating = $table_rate->update(array('rate'=> $rate));
    //     }

    //     if($table_comment==true && $comment!= '' ){
    //         DB::table('rates')->where('Book_id', $book_id)->
    //         where('user_id', Auth::id())->where('comment', null)->delete();
    //     }

    //     return redirect()->route('bookrate' , $book_id);

    request()->validate([
        'rate' => 'required',
        'comment' => 'required
    ]);

    $rate = new Rate();
    $rate->name = request('rate');
    $rate->email = request('comment');

    // $contact->user_id = Auth::user()->id;

    $contact->save();
    return redirect(route('rates.index'));
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
        $validatedData = $request->validate([
            'comment' => 'required_without:hiddenrate|max:250',
        ],
        [
            'comment.required_without'
            =>'To make a change, You have to edit something!!'
        ]);
        
        $rateId = $request->rateId;
        $rate = $request->hiddenrate;
        $comment = $request->comment;
        
        if($rate !=0){
        \App\User::find(Auth::id())->rates()
        ->updateExistingPivot($id,['rate'=>$rate]);
        }
        \App\User::find(Auth::id())->rates() 
        ->wherePivot('id',$rateId)
        ->updateExistingPivot($id,['comment'=>$comment ,'created_at' => Carbon::now()]);
    
        
        return redirect()->route('bookrate', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rates $rates)
    {
        \App\User::find(Auth::id())->rates()->wherePivot('id',$rateId)->detach($id);

        return redirect()->route('bookrate', $id);
    }
}
