@extends('layouts.app');

@section('content');
<div class="container">
            <h1>Edit a Feedback</h1> 
              <form class="col-lg-8" method="POST" action="/tasks/{{$task->id}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control  @error('name') border-danger @enderror"
                        name="name"
                        id="name"
                        value="{{$errors->any() ? old('name') : $task->name}}">
                </div>
                        @if($errors->first('subject'))
                            <p class="alert text-danger">You must enter a task name</p>
                        @endif 

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