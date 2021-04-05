@extends(@'layouts.app')

@section('content')
  <form>
    <div>
      <input type="radio" class="starRating" name="gender" value="1">
      <input type="radio"  class="starRating" name="gender" value="2">
      <input type="radio"  class="starRating" name="gender" value="3">
      <input type="radio"  class="starRating" name="gender" value="4">
      <input type="radio"  name="gender" value="5">
    </div>
  
  </form>
@endsection
