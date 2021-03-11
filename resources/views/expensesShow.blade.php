<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
@include('include.header')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col"><h1>Expenses List</h1> </div>
            <div class="col align-self-center"><a href="{{ route('expensesAdd')}}">
                <button type="submit" class="btn btn-success">New Expnese</button>
            </a></div>
            
            
        </div>
        
        <div class="table-responsive">
   <table class="table">
        <thead>
            <tr>
                <th scope="col">Expense name</th>
                <th scope="col">Sum</th>
                <th scope="col">Date</th>
                <th scope="col">Employee</th>
                <th scopt="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($expenses as $expense)
            <tr>
                <th scope="row">{{$expense->nameExpense}}</th>
                <td>{{$expense->expensesSum}}</td>
                <td>{{$expense->Date}}</td>
                <td>{{$expense->FIO}}</td>
                <td>
                <a href="{{ route('expensesUpdate', $expense->ID) }}">
                <button type="submit" class="btn btn-success">Update</button>
                </a>
                <a href="{{ route('expensesDelete', $expense->ID) }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </a>
                </td>  
                
            </tr>
        @endforeach
        </tbody>
   </table>
   </div>
    </div>
</body>
</html>