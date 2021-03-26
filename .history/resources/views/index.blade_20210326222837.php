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
                    <p>Swing by for a cup of coffee, or leave us a message:</p>
            </div>
            <div class="row">
                <div class="column">
                <img src="/w3images/map.jpg" style="width:100%">
                </div>
                <div class="column">
                <form action="/action_page.php">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name..">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                    <label for="country">Country</label>
                    <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                    </select>
                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
                    <input type="submit" value="Submit">
                </form>
                </div>
              </div>
            </div>
@endsection