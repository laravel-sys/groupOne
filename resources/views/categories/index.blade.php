@extends('layouts.app')

@section('content')

<div class="col-lg-8">
    <H1>Categories:</H1>
    @foreach($categories as $category)
        <div class="card">
            <h2>><a href="categories/{{$category->id}}">{{$category->Category}}</a></h2>
            <p>{{$category->Description}}</p>
        </div>
        <br>
    @endforeach
</div>
@endsection