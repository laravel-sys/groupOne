@extends(@'layouts.app')

@section('content')
  <form method=>
    <div class="wrap">
      <input type="radio" class="starRating" name="rated" value="1">
      <label for="starRating">&#10038;</label>
      <input type="radio"  class="starRating" name="rated" value="2">
      <label for="starRating">&#10038;</label>
      <input type="radio"  class="starRating" name="rated" value="3">
      <label for="starRating">&#10038;</label>
      <input type="radio"  class="starRating" name="rated" value="4">
      <label for="starRating">&#10038;</label>
      <input type="radio" class="starRating" name="rated" value="5">
      <label for="starRating">&#10038;</label>
    </div>
  
  </form>

  <style>
    input[type="radio"]{
        display: none;
    }
    label{font-size:2vw;}
    input:checked ~ label{color:yellow}
    wrap{display: inline-clock}
  </style>
@endsection
