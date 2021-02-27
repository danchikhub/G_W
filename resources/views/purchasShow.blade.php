<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <style> @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
   body {
    font-family: 'Poppins',sans-serif;
   }
   div.col {
     margin-top: 25px;
   }
   button#posit{
     margin-left: 5px;
   }
</style>
@include('include.header')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col"><h1>Purchas List</h1> </div>
        </div>

        <div class="table-responsive">
   <table class="table">
        <thead>
            <tr>
                <th scope="col">Raw name</th>
                <th scope="col">Amount</th>
                <th scope="col">Sum</th>
                <th scope="col">Date</th>
                <th scope="col">Employee</th>
                <th scopt="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchas)
            <tr>
                <th scope="row">{{$purchas->Raw_name}}</th>
                <td>{{$purchas->Amount}}</td>
                <td>{{$purchas->Sum}}</td>
                <td>{{$purchas->Date}}</td>
                <td>{{$purchas->FIO}}</td>
                <td>
                <a href="{{route('purchasUpdate', $purchas->ID)}}">
                <button type="submit" class="btn btn-primary">Update</button>
                </a>
                <a href="{{route('purchasDelete', $purchas->ID)}}">
                    <button  id="posit" type="submit" class="btn btn-danger">Delete</button>
                </a>
                </td>

            </tr>
        @endforeach
        </tbody>
   </table>
   </div>
   <div class="col align-self-center"><a href="{{ route('purchasAdd')}}">
                <button type="submit" class="btn btn-primary">New Purchas</button>
            </a></div>
    </div>
</body>
</html>