@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update Room Information</h1>
        <form class="col-lg-8" method="POST" action="/rooms/{{ $room->id }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type">Select type</label>
                <select class="form-control @error('type') border-danger @enderror" name="type" id="type">
                    <option value="">Select a type</option>
                    <option value="individual" @if (old('type') == 'individual') selected
                    @elseif(!$errors->any()&&$room->type=='individual')selected @endif>
                        individual
                    </option>
                    <option value="group" @if (old('type') == 'group') selected
                    @elseif(!$errors->any()&&$room->type=='group')selected @endif>
                        group
                    </option>
                </select>
                @if ($errors->has('type'))
                    <p class="alert text-danger">Select type</p>
                @endif
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name='location' class="form-control @error('location') border-danger @enderror}"
                    id="location" value="{{ @$errors->any() ? old('location') : $room->location }}">
                @if ($errors->has('location'))
                    <p class="alert text-danger">Add location</p>
                @endif
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="text" name='note' class="form-control @error('note') border-danger @enderror}" id="note"
                    value="{{ @$errors->any() ? old('note') : $room->details }}">
                @if ($errors->has('note'))
                    <p class="alert text-danger">Add note</p>
                @endif
            </div>


            <button type="submit" class="btn btn-primary  mb-5">Update</button>

        </form>
     <a class="" href="{{route('rooms.index')}}">Back</a>
        @if (\Session::has('alert'))
            <div class="col col-lg-8 alert alert-{{ \Session::get('alert') }} alert-dismissible fade show" role="alert">
                {{ \Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif
    </div>

    <div style="position: absolute; right: 0px; left: 0px; margin-top:8%">
        @include('layouts.footer')
    </div>
@endsection
