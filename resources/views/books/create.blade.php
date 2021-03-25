@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add a Book</h1>
    <p>Please fill the books info below</p>
    <form class="col-lg-8" method="POST" action="{{route('books.store')}}">
        @csrf
        <div class="form-group">
            <label for="Author">Author</label>
            <input type="text" class="form-control @error('Author') border-danger @enderror" name="Author" id="Author" value="{{old('Author')}}">
            @if ($errors->first('Author'))
            <p class="alert text-danger">You must enter an Author name</p>
            @endif
        </div>
        <div class="form-group">
            <label for="Title">Book Title</label>
            <textarea class="form-control @error('Title') border-danger @enderror}" name="Title" id="Title" value="{{old('Title')}}">
 </textarea>
            @error('Title')
            <p class="alert text-danger">Enter the Books Title</p>
            @enderror
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection