<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
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
            <div class="col"><h1>Salary List</h1> </div>
        </div>
        <div class="table-responsive">
   <table class="table">
        <thead>
            <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">Salary</th>
                <th scope="col">Bonus</th>
                <th scope="col">Date</th>
                <th scopt="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($salaries as $salary)
            <tr>
                <th scope="row">{{$salary->FIO}}</th>
                <td>{{$salary->Salary}}</td>
                <td>{{$salary->Bonus}}</td>
                <td>{{$salary->Date}}</td>
                <td>
                <a type="button" href="{{route('salaryPaymentUpdate', $salary->ID)}}">
                <button type="submit" class="btn btn-primary">Update</button>
                </a>
                <a href="{{route('salaryPaymentDelete', $salary->ID)}}">
                    <button id="posit" type="submit" class="btn btn-danger">Delete</button>
                </a>
                </td>

            </tr>
        @endforeach
        </tbody>
   </table>
   </div>
    <div class="col align-self-center"><a href="{{route('salaryPaymentAdd')}}">
                <button type="submit" class="btn btn-primary">New Salary</button>
            </a></div>
    </div>
</body>
</html>