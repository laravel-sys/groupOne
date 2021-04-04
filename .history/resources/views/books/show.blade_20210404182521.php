@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-3" {{-- style="max-width: 540px;" --}}>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ $book->img }}" alt="book image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">
                        <strong>Author</strong>: {{ $book->author }}
                    </p>
                    <p class="card-text">
                        <strong>Number of Pages</strong>: {{ $book->author }}
                    </p>
                    <p class="card-text">
                        <strong>Description</strong>: {{ $book->description }}
                    </p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
            </div>
        </div>

    </div>
       <a class="btn btn-primary mb-3" href="{{ route('index') }}">Go Back</a>

        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}" />
            <button type="submit" class="btn btn-primary mb-5">Reserve</button>
        </form>

        @if (\Session::has('success') && \Session::get('success') === true)
            <div class="alert alert-success">
                <ul>
                    <li>Please checkout your book within 24 hours</li>
                </ul>
            </div>
        @elseif (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>This book currently in use</li>
                </ul>
            </div>
        @endif
    {{-- <div class="col-lg-8 m-auto">
        <h1>{{ $book->title }}</h1>
        <h2>Author</h2>
        <p>{{ $book->author }}</p>
        <a class="btn btn-primary mb-3" href="{{ route('index') }}">Go Back</a>

        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}" />
            <button type="submit" class="btn btn-primary mb-5">Reserve</button>
        </form>

        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}" />
            <button type="submit" class="btn btn-primary mb-5">Reserve</button>
        </form>


        @if (\Session::has('success') && \Session::get('success') === true)
            <div class="alert alert-success">
                <ul>
                    <li>Please checkout your book within 24 hours</li>
                </ul>
            </div>
        @elseif (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>This book currently in use</li>
                </ul>
            </div>
        @endif
    </div> --}}
</div>
@endsection
