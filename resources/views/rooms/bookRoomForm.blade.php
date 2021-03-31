@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Room</h1>
        <p>Please fill the book info below</p>
        <form class="col-lg-8" method="POST" action="{{ route('roomsBooking.store') }}">
            @csrf
            <div class="form-group">
                <label for="date">Select Date</label>
                @php
                    $today = (new DateTime())->format('Y-m-d H:i:s');
                    $minDate = explode(' ', $today)[0]
                @endphp
                
                <input type="date" min='{{ $minDate}}' class="form-control @error('date') border-danger @enderror" name="date"
                    id="date" value="{{ old('date') }}">
                @if ($errors->first('date'))
                    <p class="alert text-danger">You must enter a valid date</p>
                @endif
            </div>

            <div class="form-group">
                <label for="time">Select Time</label>
                <select class="form-control @error('time') border-danger @enderror" name="time" id="time">
                    <option value="">Select a time</option>
                    <option value="From 08:00 AM To 09:10 AM"
                        {{ old('time') == 'From 08:00 AM To 09:10 AM' ? 'selected' : '' }}>
                        From 08:00 AM To 09:10 AM
                    </option>
                </select>
                @if ($errors->has('time'))
                    <p class="alert text-danger">Select time</p>
                @endif
            </div>

            <div class="form-group mb-5">
                <label for="room_id">Room</label>
                <select class="form-control @error('room_id') border-danger @enderror" name="room_id" id="room_id">
                    <option value="">Select a Room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                            Room #{{ $room->id }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('room_id'))
                    <p class="alert text-danger">Select Room</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary  mb-5">Submit</button>
        </form>
        @if (\Session::has('alert') && \Session::get('alert') === true)
            <div class="alert alert-success">
                <ul>
                    <li>Thanks!</li>
                </ul>
            </div>
        @elseif (\Session::has('alert'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ \Session::get('message') }}</li>
                </ul>
            </div>
        @endif
    </div>
@endsection
