@extends(@'layouts.app')

@section('content')
<div class="container">
        <div style="text-align:center; margin-bottom:100px;">
            <h1>Rate Books</h1>
            <p>Rate and comment your experience with any book you borrowed or you just read it before</p>
        </div>
   

            <form class="col-lg-8">
                <div class="wrap">
                <input type="radio"  id="starRating1" name="rated" value="1">
                <label for="starRating" id="starRating1">&#10038;</label>
                <input type="radio"   id="starRating2" name="rated" value="2">
                <label for="starRating"  id="starRating2">&#10038;</label>
                <input type="radio"  id="starRating3" name="rated" value="3">
                <label for="starRating"  id="starRating3">&#10038;</label>
                <input type="radio"  id="starRating4" name="rated" value="4">
                <label for="starRating"  id="starRating4">&#10038;</label>
                <input type="radio"  id="starRating5" name="rated" value="5">
                <label for="starRating"  id="starRating5">&#10038;</label>
                </div>
            </form>

        <div class="row">
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control @if ($errors->has('comment')) border-danger @endif"
                        name="comment" id="comment" value="{{ old('comment') }}"></textarea>

                @error('comment')
                    <p class="alert text-danger">You must enter a feedback</p>
                @enderror
            </div>

   <div>

<div>

  <style>
       form{
    display: flex;
    flex-direction: column;
    border: 2px solid red;;
    align-items: center;
}    
.wrap {
  width: fit-content;
  border: 2px solid blue;
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
