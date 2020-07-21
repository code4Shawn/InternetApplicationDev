<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
   
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <style>
       .main-container{
         display: flex;
         justify-content: center;
       }
     </style>
</head>
<body>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <div class="main-container">
   
    <form style="width: 40%; margin-top: 40px;" method="POST" action="{{url('/car/add')}}">
      @csrf
      <h4>Add car</h4>
      <div class="form-group">
        <label for="make">Make</label>
        <input type="text" class="form-control" name="make" id="make" placeholder="Enter make">
      </div>
      <div class="form-group">
        <label for="model">Model</label>
        <input type="text" class="form-control" name="model" id="model" placeholder="Enter model">
      </div>
      <div class="form-group">
        <label for="produced">Produced</label>
        <input type="date" class="form-control" name="produced" id="produced" placeholder="Enter produced">
      </div>
      <div class="form-group ">
        <button style="margin-top: 20px;" type="submit" class="btn btn-primary col-12">Add</button>
      </div>
    </form>
   </div>
</body>
</html>