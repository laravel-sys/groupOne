@extends('layouts.app')
@section('content')
    <div class="container bg-light p-3">
        <h1>My Bookings List</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Date</th>
                    <th scope="col">Book Time</th>
                    <th scope="col">Room Number</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    {{-- <th scope="col">Start Date</th> --}}
                    {{-- <th scope="col">End Date</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $c = 1;
                @endphp
                @foreach ($bookings as $data)
                    <tr>
                        <th scope="row">{{ $c }}</th>
                        <td>{{ $data->when_date }}</td>
                        <td>{{ $data->when_time }}</td>
                        <td>{{ $data->room_id }}</td>
                        <td>
                            {{ $data->status }}
                        </td>
                        <td class='d-flex'>
                            @if ($data->status == 'booked')
                                <form method="POST" action="/roomsBooking/{{ $data->id }}" class="mr-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="book_id" value="{{ $data->id }}" />
                                    <button type="submit" class="btn btn-danger" value="cancel" name="to">Cancel</button>
                                </form>
                                {{-- <a class="btn btn-primary" href="/roomsBooking/{{ $data->id }}/edit">Edit</a> --}}
                            @endif
                        </td>
                    </tr>
                    @php
                        $c += 1;
                    @endphp
                @endforeach
            </tbody>
        </table>

    </div>

    <div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
        @include('layouts.footer')
    </div>
@endsection
