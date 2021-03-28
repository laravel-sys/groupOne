@extends('layouts.app')
@section('content')
    <div class="container bg-light p-3">
        <h1>History</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($history as $h)
                    <tr>
                        <th scope="row">{{ $num }}</th>
                        <td>{{ $h->title }}</td>
                        <td>{{ explode(' ', $h->startDate)[0] }}</td>
                        <td>{{ explode(' ', $h->endDate)[0] }}</td>

                    </tr>

                    @php
                        $num++;
                    @endphp
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
