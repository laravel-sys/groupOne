@extends('layouts.app')
@section('content')
<div class="col-lg-8 m-auto">
    <h1>{{$book->Title}}</h1>
    <h2>Author</h2>
    <p>{{$book->Author}}</p>
    <a class="btn btn-primary" href="{{route('books.index')}}">Go Back</a>
    <a class="btn btn-primary" href="/books/{{$book->id}}/edit">Edit Book</a>
    <form method="POST" action="/books/{{$book->id}}">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger form-group mt-3" value="Delete Book" />
    </form>

</div>
@endsection