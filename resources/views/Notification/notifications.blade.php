@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3 p-3">
                    <h1 style="margin-bottom: 10">Wishlist</h1>
                    <hr>
                    @if (\Session::has('success') && \Session::get('success') === true)
            <div class="alert alert-success">
                <ul>
                    <li>Please checkout your book within 24 hours</li>
                </ul>
            </div>
        @elseif (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>This book currently not available</li>
                </ul>
            </div>
        @endif
                    <table style="text-align: center">
                        <tr style="border-bottom: 1px solid black;" class="row ">
                            <th class="col-md-2"> Book id</th>
                            <th class="col-md-2"> Book name </th>


                        </tr>
                        @foreach ($wishlistitems as $wishlists)
                            
                             
                                <tr style="border-bottom: 1px solid black;" class="row">
                                    
                                        

                                        <td class="col-md-2">{{ $wishlists->id }}</td>
                                       
                                        <td class="col-md-2">{{ $wishlists->title }}</td>
                                        <td class="col-md-2">
                                            <form  method="POST" action="{{ route('reservations.store') }}">
                                                @csrf
                                                <input type="hidden" name="book_id" value="{{ $wishlists->book_id}}" />
                                                <button type="submit" class="btn btn-danger mb-5">reserve</button>

                                            </form>
                                            </td>
                                            
                                        <form method="POST" action='/wishlists/{{ $wishlists->id }}'>
                                        @csrf
                                        @method('DELETE')

                                        <td class="col-md-2">          
                                              <button type="submit" class="btn btn-danger mb-5">Remove</button>
                                        </td>

                                        </form>
                                      
                                </tr>
                            
       

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; right: 0px; left: 0px; margin-top:20%">
        @include('layouts.footer')
    </div>
    {{-- </div> --}}
@endsection
