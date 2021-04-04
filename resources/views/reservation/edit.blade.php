@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Reservation# {{ $reservation->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Return Book for User {{ $user }}</h5>
                        <hr>
                        <h6 class="card-title">Loan Date: {{ explode(' ', $reservation->startDate)[0] }}</h6>
                        <h6 class="card-title mb-5">Loan Status: {{ $reservation->status }}</h6>
                        <hr>
                        <h6 class="card-title mb-5">Book Title: {{ $book->title }}</h6>
                        <img src="{{ $book->img }}" class="imgReturn" alt="book cover">
                        <form class="col-lg-8" method="POST" action="/reservations/{{ $reservation->id }}">
                            @method('PUT')
                            @csrf
                            <input type="text" name='from' value="edit" hidden>
                            <button type="submit" class="btn btn-primary mt-4">Return Book</button>
                        </form>
                    </div>
                </div>
                <a href="{{ route('returnBook') }}">Back</a>
            </div>
        </div>
    </div>

    <div style="position: absolute; right: 0; left: 0;">
        @include('layouts.footer')
    </div>
@endsection
