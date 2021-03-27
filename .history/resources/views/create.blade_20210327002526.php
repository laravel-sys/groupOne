@extends('layouts.app')

@section('content')
        <div class="container">
            <h1>Submit a form</h1>
                <p>Please fill the task info below</p>
              <form class="col-lg-8" method="POST" action="{{route('contacts.store')}}">

                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control  @error('name') border-danger @enderror"
                        name="name"
                        id="name"
                        value="{{old('name')}}">
                </div>
                        @if($errors->first('name'))
                            <p class="alert text-danger">You must enter your name</p>
                        @endif 

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control @if ($errors->has('email')) border-danger @endif"
                    name="email" id="email" value="{{old('email')}}"></textarea>

                        @error('email')
                            <p class="alert text-danger">You must enter a email</p>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <textarea class="form-control @if ($errors->has('phone')) border-danger @endif"
                    name="phone" id="phone" value="{{old('phone')}}"></textarea>

                        @error('phone')
                            <p class="alert text-danger">You must enter your phone</p>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <textarea class="form-control @if ($errors->has('subject')) border-danger @endif"
                    name="subject" id="subject" value="{{old('subject')}}"></textarea>

                        @error('subject')
                            <p class="alert text-danger">You must enter a subject</p>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control @if ($errors->has('message')) border-danger @endif"
                    name="message" id="message" value="{{old('message')}}"></textarea>

                        @error('message')
                            <p class="alert text-danger">You must enter a feedback</p>
                        @enderror
                </div>

               
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>
        </div>
@endsection