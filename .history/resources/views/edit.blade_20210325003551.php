@extends('layouts.app');

@section('content');
<div class="container">
            <h1>Edit a Feedback</h1> 
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
                    <textarea class="form-control @if ($errors->has('email')) border-danger @endif"
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

                <div class="form-group">
                    <label for="description">Task Description</label>
                    <textarea class="form-control @if ($errors->has('description')) border-danger @endif"
                    name="description" id="description">{{$errors->any() ? old('description') : $task->description}}</textarea>

                        @error('description')
                            <p class="alert text-danger">You must enter a description</p>
                        @enderror
                </div>

                <div class="form-group pb-5">
                    <label for="status">Select year of study</label>
                    <select class="form-control @error('status') border-danger @enderror"
                            name="status" id="status">

                            <option value="">Select a status...</option>
                            <option value="not started"
                                 @if (old('status') == 'not started')  selected
                                 @elseif(!$errors->any() && $task->status  == 'not started' ) selected
                                 @endif>Not start</option>
                            <option value="in progress" 
                                @if (old('status') == 'in progress')  selected
                                @elseif(!$errors->any() && $task->status  == 'in progress' ) selected
                                @endif>In progress</option>
                            <option value="completed" 
                                @if (old('status') == 'Completed')  selected
                                @elseif(!$errors->any() && $task->status  == 'Completed' ) selected
                                @endif>Completed</option>
                    </select>
                            @if ($errors->has('status'))
                            <p class="alert text-danger">Select status</p>
                            @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>
        </div>

@endsection