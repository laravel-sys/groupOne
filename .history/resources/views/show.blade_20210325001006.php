@extends('layouts.app')

@section('content')
    <div class="col-lg-8 m-auto">
        <h1>Contact Details</h1>

            <h2>Contact Subject</h2>
            <p>{{$contact->name}}</p>

            <h2>Email</h2>
            <p>{{$contact->email}}</p>

            <h2>Contact Phone</h2>
            <p>{{$contact->phone}}</p>

        <a class="btn btn-primary" href="{{route('tasks.index')}}">Go Back</a>
        <a class="btn btn-primary" href="/tasks/{{$task->id}}/edit">Edit Task</a>

        <form method="POST" action="/tasks/{{$task->id}}">
        @csrf 
        @method('DELETE')
        <input type="submit" class="btn btn-danger form-group mt-3" value="Delete Task"/>
        </form>
    </div>
@endsection