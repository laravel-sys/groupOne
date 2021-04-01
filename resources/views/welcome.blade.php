{{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/res') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div> --}}
@extends('layouts.app')
@section('content')
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

    {{-- @foreach ($books as $item)
        <div class="card mb-3">
            <h2>{{ $item->id }}</h2>
        </div>
    @endforeach --}}
    <br>
    <div class="row container m-auto">
        {{-- <div class="col-sm-4 mb-3">
            <div class="card">
                <img class="card-img-top"
                    src="https://images.theconversation.com/files/331930/original/file-20200501-42918-1tyr8tx.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="/books/1" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div> --}}
        @foreach ($books as $item)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <img class="card-img-top"
                        src="https://picsum.photos/200/300"
                        alt="Card image cap" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->author}}</p>
                        <a href="/books/{{ $item->id }}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- <div class="col-sm-4 mb-3">
            <div class="card">
                <img class="card-img-top"
                    src="https://images.theconversation.com/files/331930/original/file-20200501-42918-1tyr8tx.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card">
                <img class="card-img-top"
                    src="https://images.theconversation.com/files/331930/original/file-20200501-42918-1tyr8tx.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div> --}}
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
