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
                @foreach ($checkoutList as $item)
                    <tr>
                        <th scope="row">{{ $num }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ explode(' ', $item->startDate)[0] }}</td>
                        <td>{{ explode(' ', $item->endDate)[0] }}</td>

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
