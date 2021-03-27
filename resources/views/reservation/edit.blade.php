@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Reservation# {{$reservation->id}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Return Book for User {{ $user }}</h5>
                        {{-- <h6 class="card-title">Reservation Date: {{  $reservation->startDate}}</h6> --}}
                        <h6 class="card-title">Reservation Date: {{ explode(" ",$reservation->startDate)[0] }}</h6>
                        <h6 class="card-title mb-5">Reservation Status: {{ $reservation->status}}</h6>

                        <form class="col-lg-8" method="POST" action="/reservations/{{ $reservation->id }}">
                            @method('PUT')
                            @csrf
                            {{-- <h6 class="card-title">Returned Date:</h6>
                            <input type="date" class="mb-2" value="{{date('Y-m-d')}}" name='endDate' /> --}}
                            {{-- <h6 class="card-title">Add Comment</h6>
                            <textarea class="form-control mb-2" name="comment" placeholder="Leave Comment..."  id="comment" ></textarea> --}}
                            <button type="submit" class="btn btn-primary mt-4">Return Book</button>
                        </form>

                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                    </div>

                </div>
                <a href="{{route('returnBook')}}">Back</a>
            </div>
        </div>
    </div>

    <div style="position: absolute; bottom: 0px; right: 0; left: 0;">
        @include('layouts.footer')
    </div>
@endsection
