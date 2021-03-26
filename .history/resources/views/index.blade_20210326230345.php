@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-8 m-auto">
        <h1>Contact Info</h1>
        @foreach ($contacts as $contact)
            <div class="card mt-3">
                <p><a href="contacts/{{$contact->id}}"></p>
                <h3>Name:{{$contact->name}}</h3>
                <h3>Email:{{$contact->email}}</h3>
                <h3>Phone Number:{{$contact->phone}}</h3>
                <h3>Subject:{{$contact->subject}}</h3>
                <h3>Message:{{$contact->message}}</h3>
            </div>
            
        @endforeach
    </div>
</div>
    


            <div class="container">
            <div style="text-align:center">
                <h1>Contact Info</h1>
                    <p>For more inquiries and to contact us:</p>
            </div>
            <div class="row">
                <div class="column">
                <img src="/w3images/map.jpg" style="width:100%">
                </div>
                <div class="column">
                        <h3>Email: info@qf.org.qa</h3>
                        <h3>Tel: +9745243222 </h3>
                        <p>For general media inquiries,</p> 
                        <p></p>
                        <p></p>
                        <p></p>

                </div>
              </div>
            </div>
@endsection