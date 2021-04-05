@extends(@'layouts.app')

@section('content')
  <form method=>
    <div>
      <input type="radio" class="starRating" name="rated" value="1">
      <input type="radio"  class="starRating" name="rated" value="2">
      <input type="radio"  class="starRating" name="rated" value="3">
      <input type="radio"  class="starRating" name="rated" value="4">
      <input type="radio" class="starRating" name="rated" value="5">
    </div>
  
  </form>
@endsection
