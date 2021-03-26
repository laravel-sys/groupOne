@extends('layouts.app')

@section('content')
    <div class="col-lg-8 m-auto">
        <h1>Tasks</h1>
        @foreach ($contacts as $task)
            <div class="card mt-3">
                <h2><a href="contacts/{{$task->id}}">{{$task->name}}</a></h2>
                <p>{{$task->status}}</p>
            </div>
        @endforeach
    </div>
@endsection