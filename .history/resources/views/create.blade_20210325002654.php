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
                        @if($errors->first('subject'))
                            <p class="alert text-danger">You must enter a task name</p>
                        @endif 

                <div class="form-group">
                    <label for="description">Task Descrption</label>
                    <textarea class="form-control @if ($errors->has('description')) border-danger @endif"
                    name="description" id="description" value="{{old('description')}}"></textarea>

                        @error('description')
                            <p class="alert text-danger">You must enter a description</p>
                        @enderror
                </div>

                <div class="form-group pb-5">
                    <label for="status">Select year of study</label>
                    <select class="form-control"
                            name="status" id="status">

                            <option value="">Select a status...</option>
                            <option value="not started" {{old('status') == "not started" ? 'selected' : '' }}>Not started</option>
                            <option value="in progress" {{old('status') == "in progress" ? 'selected' : '' }}>In progress</option>
                            <option value="completed" {{old('status') == "completed" ? 'selected' : '' }}>Completed</option>
                    </select>
                            @if ($errors->has('status'))
                            <p class="alert text-danger">Select status</p>
                            @endif
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>
        </div>
@endsection