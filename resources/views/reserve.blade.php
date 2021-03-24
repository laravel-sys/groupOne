@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card mt-3">
        <h1>Reserve a Book</h1>
        <form class="col-lg-8" method="POST" action="{{route('reservations.store')}}">
 @csrf
 <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
 <lable for="bookID"> Book id</lable>
 <input name="book_id" />
 <lable for="startdate"> reserve at</lable>
 <input 
    name="startdate" 
    id="date" 
    class="form-control" 
    style="width: 100%; display: inline;" 
    onchange="invoicedue(event);" 
    type="date">
 <lable for="EndDate"> return at</lable>
 <input 
    name="enddate" 
    id="date" 
    class="form-control" 
    style="width: 100%; display: inline;" 
    onchange="invoicedue(event);" 
    type="date">
 
    <input type="submit" class="btn btn-danger form-group mt-3" value="Reserve Book"/>
    @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif
 </form>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection