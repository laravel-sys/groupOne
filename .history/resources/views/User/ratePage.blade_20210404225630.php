@extends(@'layouts.app')

@section('content')
  <form method=>
    <div>
      <input type="radio" class="starRating" name="rated" value="1">
      <label for="starRating">&#10038;</label>
      <input type="radio"  class="starRating" name="rated" value="2">
      <label for="starRating">Male</label>
      <input type="radio"  class="starRating" name="rated" value="3">
      <label for="starRating">Male</label>
      <input type="radio"  class="starRating" name="rated" value="4">
      <label for="starRating">Male</label><br>
      <input type="radio" class="starRating" name="rated" value="5">
    </div>
  
  </form>
@endsection
