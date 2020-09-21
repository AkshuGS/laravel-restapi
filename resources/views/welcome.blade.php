<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link disabled" href="#">My Assignment</a>
    </li>
  </ul>
</nav>
</div>
<div class="container">
    <div class="row">
    <div class="col-sm-12 ">

      <div class="card card-body h-100">
      <form action="/post-submit" method="POST">
      @csrf
      <div class="input-group mb-3">
      <input type="text" name="name" class="form-control" placeholder="Add todo">
      <div class="input-group-append">
        <button class="btn btn-success" type="submit">Add</button>
      </div>
      </div>
      </form>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
      @endif
      @foreach($todos as $todo)
      <div  class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultUnchecked{{$todo->name}}">
        <label class="custom-control-label" for="defaultUnchecked{{$todo->name}}">{{$todo->name}}</label>
        
        <button data-id="{{ $todo->id }}" type="button" class="btn btn-default btn-sm deleteRecord">
          <span class="glyphicon glyphicon-trash"></span> Remove 
        </button>
        <hr>
        
      </div>
      @endforeach
      </div>
        </div>
       
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript">

$(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   alert("Do You want to delete?");
    $.ajax(
    {
        url: "todo/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
           alert("1234");
           window.location.href = "/";
        }
    });
   
});

  </script>
  
  </body>
</html>