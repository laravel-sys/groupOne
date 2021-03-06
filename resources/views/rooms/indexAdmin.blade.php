@extends('layouts.app')
@section('content')
    <div class="container bg-light p-3">
        <h1>Bookings List</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User ID</th>
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
                        <th scope="row">{{ $data->user_id }}</th>
                        @php
                            $date_one = $data->when_date; //string variable
                            $date_two = date('Y-m-d', time()); //date variable

                            $time1 = strtotime($date_one);
                            $time2 = strtotime($date_two);
                            if ($time1 < $time2 && $data->status == 'booked') {
                                echo '<td style="color:red; font-weight:bolder">' . $data->when_date . '</td>';
                            } else {
                                echo '<td>' . $data->when_date . '</td>';
                            }
                        @endphp

                        <td>{{ $data->when_time }}</td>
                        <td>{{ $data->room_id }}</td>
                        <td>{{ $data->status }}</td>

                        <td class='d-flex'>
                            @if ($data->status == 'booked')
                                <form method="POST" action="/roomsBooking/{{ $data->id }}" class="mr-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="book_id" value="{{ $data->id }}" />
                                    <button type="submit" class="btn btn-success" value="close" name="to">CLOSE</button>
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
