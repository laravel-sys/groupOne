@extends(@'layouts.app')

@section('content')

<div class="row">
 
    <div class="card-body">
       
            

    <p class="card-title title">{{ $book->title }}</p>
        <div >
          @for($i =1 ; $i<=5 ; $i++)
          @if($i<=$rate)
          <img class="rank" src="/rank.png">
          @else
          <img class="rank" src="/rankicon.png">
          @endif
          @endfor
        </div>
       

<div class="row">
    <div class="form-group comment">
        <textarea name="comment" class="form-control" rows="4" cols="110" placeholder="Your Comment..." form="form"></textarea>
        <a class="btn btn-primary btn-sm btn-block">{!! Form::submit('Comment',['form'=>'form','class' => 'btn btn-primary']); !!}</a>
    </div>
    
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

{{---------------------------------------------------------------------------------------------}}
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {{-- form --}}
{!! Form::open(['route'=>['rate.update',$book->id],'method'=>'put' , 'id' =>'hiddenform']) !!}
      {{ Form::hidden('hiddenrate') }}
      {{ Form::hidden('rateId','',['id'=>'rateId']) }}
      <div class="ratestar">
        @for($i=0; $i<5 ; $i++)
        <span class="ranks">☆</span>
        @endfor
        </div>
      <textarea name="comment" class="form-control" rows="3" id="comment"></textarea>
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="hiddenform" >Save changes</button>
      </div>
    </div>
  </div>
</div>
<div style="position: absolute; right: 0px; left: 0px;">
        @include('layouts.footer')
    </div>
@endsection
