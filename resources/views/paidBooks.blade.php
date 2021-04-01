@extends('layouts.app')
@section('content')
<div class="container bg-light p-3">
    <h1>Late Books</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book</th>
                <th scope="col">Fees</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            </tr>
            @foreach ($paidBooks as $paidBook)
            <tr>
                <th scope="row">{{ $num }}</th>
                <td>{{ $paidBook->book_id }}</td>
                <td>{{ $paidBook->fees}}</td>
                <td>{{ $paidBook->status}}</td>
            </tr>
            @php
            $num = 1;
            @endphp
            @php
            $num++;
            @endphp

        </tbody>
    </table>

</div>

<div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
    @include('layouts.footer')
</div>
@endsection