<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpensesUpdate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="..\css\styles.css">
</head>
<body>
    <div class="hei">
        <h2>Expenses Update</h2>
        <form action="{{ route('expensesUpdateSubmit', $exps->ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Expense</label>
                <select name="Expense" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($expExpenses as $expExpense)
                    <option  value="{{ $expExpense->ID}}" selected>--Selected {{ $expExpense->nameExpense}} --</option>
                    @endforeach
                    @foreach($expenses as $expense)
                        <option value="{{$expense->ID}}">{{$expense->nameExpense}}</option>
                    @endforeach
                    
                </select>
            </div>

            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sum</label>
                <input value="{{$exps->expensesSum}}" name="Sum" style="width:300px;" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input value="{{$exps->Date}}" name="Date" style="width:300px;" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="Employee" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($expEmployees as $expEmployee)
                    <option  value="{{$expEmployee->ID}}" selected>--Selected {{$expEmployee->FIO}} --</option>
                    @endforeach
                    @foreach($employees as $employee)
                        <option value="{{$employee->ID}}">{{$employee->FIO}}</option>
                    @endforeach
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update expense</button>
            <a type="button" href="{{ route('expensesShow')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>