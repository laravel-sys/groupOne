@extends(@'layouts.app')

@section('content')
<div class="container">
        <div style="text-align:center; margin-bottom:100px;">
            <h1>Rate Books</h1>
            <p>Rate and comment your experience with any book you borrowed or you just read it before</p>
        </div>
   

                      <form>
                            <div class="wrap" >
                                <input type="radio" id="r1" name="rated" value="5">
                                <label for="r1">&#10038;</label>
                                <input type="radio" id="r2" name="rated" value="4">
                                <label for="r2">&#10038;</label>
                                <input type="radio" id="r3" name="rated" value="3">
                                <label for="r3">&#10038;3</label>
                                <input type="radio" id="r4" name="rated" value="2">
                                <label for="r4">&#10038;4</label>
                                <input type="radio" id="r5" name="rated" value="1">
                                <label for="r5">&#10038;5</label>
                            </div>
                            
                        <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea class="form-control @if ($errors->has('comment')) border-danger @endif"
                                        name="comment" id="comment" value="{{ old('comment') }}"></textarea>

                                @error('comment')
                                    <p class="alert text-danger">You must enter a feedback</p>
                                @enderror
                       </div>

            </form>
<div>

  <style>
            form{
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }    
            .wrap {
            width: fit-content;
            display: inline-block;


            }
            .wrap * {
            float: right;

            }
            input {
            opacity: 0;

            }
            label {
            font-size: 4vw;
            }



            input:checked ~ label {
            color: gold;
            }

  </style>

 
@endsection
