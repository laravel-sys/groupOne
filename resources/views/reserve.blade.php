@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <h1>Reserve a Book</h1>
                    @foreach ($books as $book)
                        <form class="col-lg-8" method="POST" action="{{ route('reservations.store') }}">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                            <label for="bookID"> {{ $book->title }}</label> <br>

                            <input type="hidden" name="book_id" value="{{ $book->id }}" />
                            <button type="submit" class="btn btn-primary">reserve</button>

                        </form>


                    @endforeach
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
        @include('layouts.footer')
    </div>
@endsection
