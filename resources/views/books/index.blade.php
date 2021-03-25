@extends('layouts.app')

@section('content')

<div class="col-lg-8">
    <H1>Books list:</H1>
        <p>This is the Books page</p>
    @foreach($books as $book)
        <div class="card">
            <h2>><a href="books/{{$book->id}}">{{$book->Title}}</a></h2>
            <p>{{$book->Author}}</p>
        </div>
        <br>
    @endforeach
</div>
@endsection