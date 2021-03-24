@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card mt-3">
        <h1>Reservations</h1>
        <table >
 <tr style="border-bottom: 1px solid black;" class="row ">
 <th class="col-md-1"> User</th>
 <th class="col-md-1"> Book</th>
 <th class="col-md-2"> start date </th>
 <th class="col-md-2"> end date </th>
 <th class="col-md-2"> status </th>
 <th class="col-md-2"> comment </th>
 <th class="col-md-2"> submit </th>

 </tr>
 @foreach($reservedBooks as $reservation)

 
 <form method="POST" action="/reservations/{{$reservation->id}}">
 @csrf
 @method('PUT')

 <tr style="border-bottom: 1px solid black;" class="row">
 <td class="col-md-1" >{{$reservation->user_id}}</td>

 <td class="col-md-1" >{{$reservation->book_id}}</td>
 <td class="col-md-2" >{{$reservation->startDate}}</td>
 <td class="col-md-2">{{$reservation->endDate}}</td>
 <td class="col-md-2"><select name="status" value="{{$reservation->status}}">
 <option value="accept">Accept</option>
 <option value="decline">Decline</option>
</select>
 </td>
 <td class="col-md-2"> <input  name="comment"  />
</td>


 <td class="col-md-2">
 
 <input type="hidden" name="book_id" value="{{$reservation->book_id}}" />
 <input type="hidden" name="startdate" value="{{$reservation->startDate}}" />
 <input type="hidden" name="enddate" value="{{$reservation->endDate}}" />

 
 <input type="hidden" name="user_id" value="{{$reservation->user_id}}" />

 <button type="submit" class="btn btn-primary">submit</button>
 
 </td>
 </tr>
 </form>
 
 @endforeach
 </table>
 </div></div>
        </div>
    </div>
</div>
@endsection
