@extends('layouts.app');

@section('content');
<div class="container">
            <h1>Edit a form</h1> 
              <form class="col-lg-8" method="POST" action="/contacts/{{$contact->id}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control  @error('name') border-danger @enderror"
                        name="name"
                        id="name"
                        value="{{$errors->any() ? old('name') : $contact->name}}">
                </div>
                        @if($errors->first('name'))
                            <p class="alert text-danger">You must enter your name</p>
                        @endif 

                        <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control @if ($errors->has('email')) border-danger @endif"
                    name="email" id="email" value="{{old('email')}}"/>

                        @error('email')
                            <p class="alert text-danger">You must enter a email</p>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control @if ($errors->has('phone')) border-danger @endif"
                    name="phone" id="phone" value="{{old('phone')}}"/>

                        @error('phone')
                            <p class="alert text-danger">You must enter your phone</p>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control @if ($errors->has('subject')) border-danger @endif"
                    name="subject" id="subject" value="{{old('subject')}}"/>

                        @error('subject')
                            <p class="alert text-danger">You must enter a subject</p>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control @if ($errors->has('message')) border-danger @endif"
                    name="message" id="message" value="{{old('message')}}"></textarea>

                        @error('message')
                            <p class="alert text-danger">You must enter a form</p>
                        @enderror
                </div>

              
                    <button type="submit" class="btn btn-primary" href="{{route('contacts.index')}}">Submit</button>

                  </form>
        </div>

@endsection