@extends('layouts.app')

@section('content')
    <div class="col-lg-8 m-auto">
        <h1>contacts</h1>
        @foreach ($contacts as $contact)
            <div class="card mt-3">
                <h2><a href="contacts/{{$contact->id}}">{{$contact->name}}</a></h2>
                <p>{{$contact->email}}</p>
            </div>
        @endforeach
    </div>
@endsection