@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editing a Category</h1>
    <p>Please fill the Category info below</p>
    <form class="col-lg-8" method="POST" action="/categories/{{$category->id}}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="Category">Category</label>
            <input type="text" class="form-control @error('Category') border-danger @enderror" name="Category" id="Category" value="{{old('Category')}}">
            @if ($errors->first('Category'))
            <p class="alert text-danger">You must enter a Category</p>
            @endif
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control @error('Description') border-danger @enderror}" name="Description" id="Description" value="{{old('Description')}}">
 </textarea>
            @error('Description')
            <p class="alert text-danger">Enter the Description</p>
            @enderror
        </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection