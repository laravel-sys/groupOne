@extends(@'layouts.app')

@section('content')
<div class="container">
        <div style="text-align:center; margin-bottom:100px;">
            <h1>BOOKY Contact Info</h1>
            <p>For more inquries please contact us:</p>
        </div>
        <div class="row">

  <form>
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
  <div style>
        form{
            display: flex;
            flex-direction: column;
        }    
        .wrap {
            display: inline-block;
            width: fit-content;
        }
        .wrap * {
            float: right;
        }
        input {
          display: none;
        }
        label {
             font-size: 30px;
        }

        input:checked ~ label {
            color: gold;
        }

        input:checked ~ label {
        color: gold;
        }

  </style>

 
@endsection
