@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Room</h1>
        <form class="col-lg-8" method="POST" action="{{ route('rooms.store') }}">
            @csrf
            <div class="form-group">
                <label for="type">Select type</label>
                <select class="form-control @error('type') border-danger @enderror" name="type" id="type">
                    <option value="">Select a type</option>
                    <option value="individual"
                        {{ old('type') == 'individual' ? 'selected' : '' }}>
                        individual
                    </option>
                    <option value="group"
                        {{ old('type') == 'group' ? 'selected' : '' }}>
                        group
                    </option>
                </select>
                @if ($errors->has('type'))
                    <p class="alert text-danger">Select type</p>
                @endif
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name='location' class="form-control @error('location') border-danger @enderror}"  id="location" value="{{old('location')}}">
                @if ($errors->has('location'))
                    <p class="alert text-danger">Add location</p>
                @endif
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="text" name='note' class="form-control @error('note') border-danger @enderror}"  id="note" value="{{old('note')}}">
                @if ($errors->has('note'))
                    <p class="alert text-danger">Add note</p>
                @endif
            </div>


            <button type="submit" class="btn btn-primary  mb-5">👍🏻 Add</button>
        </form>
    </div>

    <div style="position: absolute; right: 0px; left: 0px; margin-top:8%">
        @include('layouts.footer')
    </div>
@endsection
