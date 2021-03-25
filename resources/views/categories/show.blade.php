@extends('layouts.app')
@section('content')
<div class="col-lg-8 m-auto">
    <h1>{{$category->Category}}</h1>
    <h2>Description</h2>
    <p>{{$category->Description}}</p>
    <a class="btn btn-primary" href="{{route('categories.index')}}">Go Back</a>
    <a class="btn btn-primary" href="/categories/{{$category->id}}/edit">Edit Category</a>
    <form method="POST" action="/categories/{{$category->id}}">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger form-group mt-3" value="Delete Category" />
    </form>

</div>
@endsection