@extends('layouts.app')
@section('content')
    <div class="container bg-light p-3">
        <h1>Users Messages</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    {{-- <th scope="col">Start Date</th> --}}
                    {{-- <th scope="col">End Date</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($messages as $h)
                    <tr>
                        <th scope="row">{{ $num }}</th>
                        <td>{{ $h->name }}</td>
                        <td>{{ $h->email }}</td>
                        <td>{{ $h->phone }}</td>
                        <td>{{ $h->message }}</td>
                        <td>{{ $h->created_at }}</td>
                        {{-- <td>{{ explode(' ', $h->startDate)[0] }}</td>
                        <td>{{ explode(' ', $h->endDate)[0] }}</td> --}}

                    </tr>

                    @php
                        $num++;
                    @endphp
                @endforeach
            </tbody>
        </table>

    </div>

    <div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
        @include('layouts.footer')
    </div>
@endsection
