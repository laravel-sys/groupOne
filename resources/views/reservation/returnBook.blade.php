@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <h1>Return Book</h1>
                {{-- @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif --}}
                <form class="col-lg-8" action="{{ route('returnBook') }}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{$old}}" name="book_id" placeholder="Book ID">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                        </div>
                    </div>
                </form>



                @foreach ($reservations as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                Reservation#: {{ $item->id }}
                            </div>
                            <div class="alert alert-success" role="alert">
                                Book#: {{ $item->book_id }}
                            </div>
                            <a class="btn btn-primary" href="/reservations/{{ $item->id }}/edit">Details</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div style="position: absolute; right: 0; left: 0; margin-top: 10%">
        @include('layouts.footer')
    </div>
@endsection
