@extends('layouts.app')

@section('content')
    <div class="col-lg-8 m-auto">
        <h1>Contact Details</h1>

            <h3>Name:{{$contact->name}}</h3>
            <h3>Email:{{$contact->email}}</h3>
            <h3>Phone Number:{{$contact->phone}}</h3>
           

        <a class="btn btn-primary" href="{{route('contacts.index')}}">Go Back</a>
        <a class="btn btn-primary" href="/contacts/{{$contact->id}}/edit">Edit Task</a> 

        
    </div>
@endsection