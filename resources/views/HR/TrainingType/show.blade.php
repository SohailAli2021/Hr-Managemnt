
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
        
    <br>
    <br>
    <br>
   
    <div class="container">
      <div class="row">
       <div class="col-sm">
         <h1 class="jumbotron bg-dark text-center text-white">Department Detail</h1>
         
         <table class="table table-bordered table-striped table-hover">
           <thead>
             
               <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Head</th>
                   
                 
               </tr>
           </thead>
           <tbody>
              
             
             
             
             <tr>
               <td>{{$department['id']}}</td>
               <td>{{$department['Name']}}</td>
               <td>{{$department['Head']}}</td>
              
              </tr>
<td> 
              <form action="{{action('App\Http\Controllers\DepartmentController@destroy', $department['id'])}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger" alert()>
                </form>
              </td>
           </tbody>
         </table>
       </div>
       </div>   
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
