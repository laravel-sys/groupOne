@extends('layouts.app')

@section('content')
    <div class="col-lg-8 m-auto">
        <h1>Contact Details</h1>

            <h2>Contact Subject</h2>
            <p>{{$contact->name}}</p>

            <h2>Email</h2>
            <p>{{$contact->email}}</p>

            <h2>Phone Number</h2>
            <p>{{$contact->phone}}</p>

        <a class="btn btn-primary" href="{{route('contacts.index')}}">Go Back</a>
        <!-- <a class="btn btn-primary" href="/contacts/{{$contact->id}}/edit">Edit Task</a> -->

        <form method="POST" action="/tasks/{{$contact->id}}">
        @csrf 
        @method('DELETE')
        <input type="submit" class="btn btn-danger form-group mt-3" value="Delete Task"/>
        </form>
    </div>
@endsection