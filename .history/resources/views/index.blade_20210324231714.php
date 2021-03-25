@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-8 m-auto">
        <h1>Contact Info</h1>
        @foreach ($contacts as $contact)
            <div class="card mt-3">
                <h2><a href="contacts/{{$contact->id}}">{{$contact->name}}</a></h2>
                <p>{{$contact->email}}</p>
                <p>{{$contact->phone}}</p>
            </div>
        @endforeach
    </div>
</div>
    
@endsection