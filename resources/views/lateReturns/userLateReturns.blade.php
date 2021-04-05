@extends('layouts.app')
@section('content')
    <div class="container bg-light p-3">
        <h1>Late Books</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Fee</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                    $fees = 0;
                    $total = 0;
                @endphp
                @php
                    $num = 1;
                @endphp
                @foreach ($userLateReturns as $item)
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
                        <td>{{ $fees }} $</td>
                    </tr>
                    @php
                        $num++;
                        $total = $fees + $total;
                    @endphp
                @endforeach
                <tr>
                    <td></td>
                    <td>Total Fees:</td>
                    <td>{{ $total }} $</td>
                </tr>
            </tbody>
        </table>

    </div>

    <div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
        @include('layouts.footer')
    </div>
@endsection
