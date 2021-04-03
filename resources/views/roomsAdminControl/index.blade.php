@extends('layouts.app')
@section('content')
    <div class="container bg-light p-3">
        <h1>Rooms</h1>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-2">Add New Room</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Location</th>
                    <th scope="col">Notes</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($rooms as $data)
                    <tr>
                        <th scope="row">{{ $num }}</th>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->location }}</td>
                        <td>{{ $data->details }}</td>
                        <td>   <a class="btn btn-primary" href="/rooms/{{ $data->id }}/edit">Update the info</a></td>
                        <td>
                            <form method="POST" action="/rooms/{{ $data->id }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger form-group" value="Remove the Room" />
                            </form>
                        </td>
                    </tr>

                    @php
                        $num++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        @if (\Session::has('alert'))
            <div class="col col-lg-8 alert alert-{{\Session::get('alert')}} alert-dismissible fade show" role="alert">
                {{\Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif
    </div>

    <div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
        @include('layouts.footer')
    </div>
@endsection
