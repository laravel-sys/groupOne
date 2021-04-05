@extends('layouts.app')
@section('content')
    <div class="container bg-light p-3">
        <h1>Late Books</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book</th>
                    <th scope="col">User</th>
                    <th scope="col">Fee</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                    $fees = 0;
                    $total = 0;
                @endphp

                @foreach ($adminLateReturns as $item)


                    @php
                        $now = time(); // or your date as well
                        $your_date = strtotime($item->endDate);
                        $datediff = $now - $your_date;
                        $extraDate = round($datediff / (60 * 60 * 24));

                    @endphp
                    @if ($extraDate != 0)
                        @php
                            $fees = $fees + $extraDate;
                        @endphp
                    @endif
                    <tr>
                        <th scope="row">{{ $num }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $fees }}$</td>
                        <td>
                            <form class="col-lg-8" method="POST" action="/lateReturns/{{$item->id}}">
                                @csrf
                                @method('PUT')
                                <input name="book_id" id="book_id" value="{{ $item->book_id }}" hidden>
                                <input name="user_id" id="user_id" value="{{ $item->user_id }}" hidden>
                                <input name="fees" id="fees" value="{{ $fees }}" hidden>
                                <input name="reservation_id" id="reservation_id" value="{{ $item->reservation_id }}" hidden>
                                <input name="status" id="status" value="paid" hidden>
                                <input name="id" id="id" value="{{ $item->id }}" hidden>
                                <input type="text" name='from' value="edit" hidden>
                                <button type="submit" class="btn btn-primary" >Paid</button>
                            </form>
                        </td>
                    </tr>

                    @php
                        $num++;
                        $total = $fees + $total;
                    @endphp
                @endforeach
            </tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Fees:</td>
                <td>{{ $total }}$</td>
            </tr>
        </table>

    </div>

    <div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
        @include('layouts.footer')
    </div>
@endsection
