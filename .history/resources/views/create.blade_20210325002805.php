@extends('layouts.app')

@section('content')
        <div class="container">
            <h1>Create a feedback</h1>
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
                    <textarea class="form-control @if ($errors->has('email')) border-danger @endif"
                    name="email" id="email" value="{{old('email')}}"></textarea>

                        @error('email')
                            <p class="alert text-danger">You must enter a email</p>
                        @enderror
                </div>

               
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>
        </div>
@endsection