@extends('layouts.app')
@section('content')
    <div class="row justify-content-md-center">
        @if (\Session::has('success') && \Session::get('success') === true)
            <div class="col col-lg-8 alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thanks!</strong> Please checkout your book within 24 hours
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (\Session::has('success'))
            <div class="col col-lg-8 alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> This book currently in use
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="container d-flex align-items-center mb-5">
        <div class="row">
            <div class="col-lg-5 d-flex flex-column justify-content-center">
                <h1>Welcome to Booky.com</h1>
                <p>Over than 1000 books avalible for you!</p>
            </div>
            <div class="col-lg-7 d-flex justify-content-end">
                {{-- <aside class="d-flex justify-content-end"> --}}
                <img class="aniOne" src="https://acegif.com/wp-content/gifs/book-95.gif" style="width: 95%"
                    alt="img header">
                {{-- </aside> --}}
            </div>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ URL::to('/assets/quotes/q1.png') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ URL::to('/assets/quotes/q2.png') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ URL::to('/assets/quotes/q3.png') }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <form class="col-lg-8 m-auto" id="searchTitle" action="{{ route('index') }}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" value="{{ $old }}" name="book_id" placeholder="Find book ...">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </div>
    </form>

    <br>
    <div class="row container m-auto">
        <br>
        <div class="row container m-auto">
            @foreach ($books as $item)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ $item->img }}" alt="Card image cap" style="height: 400px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->author }}</p>
                            <div class="row justify-content-md-start">
                                <div class="col col-lg-2 mr-5">
                                    <a href="/books/{{ $item->id }}" class="btn btn-primary mb-2">Details</a>
                                </div>
                                <div class="col col-lg-2 mr-5">
                                    <form method="POST" action="{{ route('reservations.store') }}">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $item->id }}" />
                                        <button type="submit" class="btn btn-success mb-5">Reserve</button>
                                    </form>
                                </div>
                                <div class="col col-lg-2">
                                    <form method="POST" action="{{ route('wishlists.store') }}">
                                        @csrf
                                        <input name="book_id" value="{{ $item->id }}" hidden />
                                        <button type="submit" class="btn btn-success mb-5">wishlist</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div style="position: absolute; right: 0; left: 0;">
        @include('layouts.footer')
    </div>

    <script>
        const old = () => {
            return {{ $old }}
        }
        if (old()) {
            var elmnt = document.getElementById("searchTitle");
            elmnt.scrollIntoView();
        }

    </script>
@endsection
