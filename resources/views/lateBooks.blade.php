@extends('layouts.app')
@section('content')
<div class="container bg-light p-3">
    <h1>Late Books</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Name</th>
                <th scope="col">Fees</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lateBooks as $latebook)

            <tr style="border-bottom: 1px solid black;" class="row">
                <td class="col-md-1">{{ $latebook->book_id }}</td>
                <td class="col-md-1">{{ $latebook->user_id }}</td>
                <td class="col-md-1">10</td>
                <td>{{ explode(' ', $latebook->endDate)[0] }}</td>
                <td class="col-md-1">{{ $latebook->status }}</td>
            </tr>
            <tr>
                <form method="POST" action="{{ route('lateBook.store') }}">
                    @csrf
                    <td class="col-md-2">
                        <input type="hidden" name="book_id" value="{{ $latebook->book_id }}" />
                        <input type="hidden" name="user_id" value="{{ $latebook->user_id }}" />
                        <input type="hidden" name="fees" value="10" />
                        {{-- <input type="date" class="mb-2" value="{{date('Y-m-d')}}" name='endDate' /> --}}
                        <input type="hidden" name="user_id" value="{{ $latebook->user_id }}" />
                        <input type="hidden" name="status" value="paid" />
                        <button type="submit" class="btn btn-primary">Pay</button>
                    </td>
                </form>
            </tr>

            @endforeach
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