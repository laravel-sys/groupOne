@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-3" {{-- style="max-width: 540px;" --}}>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ $book->img }}" alt="book image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">
                        <strong>Author</strong>: {{ $book->author }}
                    </p>
                    <p class="card-text">
                        <strong>Number of Pages</strong>: {{ $book->author }}
                    </p>
                    <p class="card-text">
                        <strong>Description</strong>: {{ $book->description }}
                    </p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
            </div>
        </div>

    </div>
       <a class="btn btn-primary mb-3" href="{{ route('index') }}">Go Back</a>

        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}" />
            <button type="submit" class="btn btn-primary mb-5">Reserve</button>
        </form>

      

        @if (\Session::has('success') && \Session::get('success') === true)
            <div class="alert alert-success">
                <ul>
                    <li>Please checkout your book within 24 hours</li>
                </ul>
            </div>
        @elseif (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>This book currently in use</li>
                </ul>
            </div>
        @endif

    <form method="POST" action="{{ route('rates.index') }}">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}" />
            <button type="submit" class="btn btn-primary mb-5"  href="{{ route('rates.index') }}">Rate</button>
            <div class="form-group required">

            <div class="form-group comment">
                <textarea name="comment" class="form-control" rows="4" cols="110" placeholder="Your Comment..." form="form"></textarea>
                <a class="btn btn-primary btn-sm btn-block">{!! Form::submit('Comment',['form'=>'form','class' => 'btn btn-primary']); !!}</a>
                </div>
                <div class="col-sm-12">
                <div class="rankwithcomment">
                    {!! Form::open(['route'=>['bookRstore'],'method'=>'post', 'class' => 'rating' , 'id' =>'form']) !!}
                    {{ Form::hidden('id', $book->id) }}
                <label>
                    {!! Form::radio('rate', '1') !!}
                    <span class="icon">★</span>
                </label>
                <label>
                    {!! Form::radio('rate', '2') !!}
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                </label>
                <label>
                    {!! Form::radio('rate', '3') !!}
                        @for($i=0; $i<3; $i++)
                        <span class="icon">★</span>
                        @endfor
                </label>
                <label>
                    {!! Form::radio('rate', '4') !!}
                        @for($i=0; $i<4; $i++)
                        <span class="icon">★</span>
                        @endfor
                </label>
                <label>
                    {!! Form::radio('rate', '5') !!}
                        @for($i=0; $i<5 ; $i++)
                        <span class="icon">★</span>
                        @endfor
                </label>
                    {!! Form::close() !!}
             
         </div>
        </div>  
        </div>

    <div>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
        @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    </div>

    <div class="row">
            @foreach ($book->rate as $comment)
                <table class="table">
                    <thead>
                     <tr>
                        <th scope="col" colspan="2">
                            {{ $comment->name }}<br>
                            <i><small>{{ date('d M Y  H:i:s', strtotime($comment->pivot->created_at)) }}</small></i>
                                <span id="stars-container">
                                    @php
                                    $counter = 5 
                                    @endphp
                                    @for($i=1 ; $i<= $comment->pivot->rate ; $i++ )
                                        <span class="star" style="color:gold;">★</span>
                                        @php 
                                        $counter--; 
                                        if($counter<0) $counter=0;
                                        @endphp
                                    @endfor
                                    @for($i=1 ; $i<=$counter ; $i++ )
                                        <span class="star">★</span>
                                    @endfor             
                            </span>
                        </th>
                     </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td> 
                            {{ $comment->pivot->comment?? '.....' }} 
                        </td>
                        <td>
                                @if($comment->pivot->user_id === $user)
                                <div id="form-container">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" 
                                data-id="{{ $comment->pivot->id }}" data-comment="{{$comment->pivot->comment}}">
                                Edit
                                </button>


                                {!! Form::open(['route'=>['delete_rate',$book->id, $comment->pivot->id],'method'=>'delete', 'class'=>' button']) !!}
                                {!! Form::submit('delete',['class' =>'btn btn-danger']); !!}
                                {!! Form::close() !!}
        </div>
                                @endif 
                        </td>
                    
                    </tr>
                    </tbody>
                </table>
            @endforeach
         </div>

    </div>
                    
 </div>
                
</form>

    {{-- <div class="col-lg-8 m-auto">
        <h1>{{ $book->title }}</h1>
        <h2>Author</h2>
        <p>{{ $book->author }}</p>
        <a class="btn btn-primary mb-3" href="{{ route('index') }}">Go Back</a>

        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}" />
            <button type="submit" class="btn btn-primary mb-5">Reserve</button>
        </form>

      


        @if (\Session::has('success') && \Session::get('success') === true)
            <div class="alert alert-success">
                <ul>
                    <li>Please checkout your book within 24 hours</li>
                </ul>
            </div>
        @elseif (\Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    <li>This book currently in use</li>
                </ul>
            </div>
        @endif
    </div> --}}
</div>
        <!-- <style>
                    div.stars {
                    display: inline-block;
                    }

                    input.star { display: none; }

                    label.star {
                    padding: 10px;
                    font-size: 20px;
                    color: #444;
                    transition: all .2s;
                    }

                    input.star:checked ~ label.star:before {
                    content: 'f005';
                    color: #e74c3c;
                    transition: all .25s;
                    }

                    input.star-5:checked ~ label.star:before {
                    color: #e74c3c;
                    text-shadow: 0 0 5px #7f8c8d;
                    }

                    input.star-1:checked ~ label.star:before { color: #F62; }

                    label.star:hover { transform: rotate(-15deg) scale(1.3); }

                    label.star:before {
                    content: 'f006';
                    font-family: FontAwesome;
                    }


                    .horline > li:not(:last-child):after {
                        content: " |";
                    }
                    .horline > li {
                    font-weight: bold;
                    color: #ff7e1a;

                    }

        </style>
            <script>
                $('#addStar').change('.star', function(e) {
                $(this).submit();
                });
            </script> -->
@endsection
