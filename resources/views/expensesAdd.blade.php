<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpensesAdd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="..\css\styles.css">
</head>
<body>
    <div class="hei">
        <h2>Expenses Add</h2>
        
        <form action="{{ route('expenseAddSubmit' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Expense</label>
                <select name="Expense" style="width:300px;" class="expense form-select" aria-label="Default select example">
                    <option selected>Please select Expense</option>
                    @foreach($expenses as $expense)
                        <option value="{{$expense->ID}}">{{$expense->nameExpense}}</option>
                    @endforeach
                    
                </select>
            </div>

            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sum</label>
                <input name="Sum" style="width:300px;" type="text" class="sum form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input name="Date" style="width:300px;" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Raw</label>
                <select name="Employee" style="width:300px;" class="form-select" aria-label="Default select example">
                    <option selected>Please select employee</option>
                    @foreach($employees as $employee)
                        <option value="{{$employee->ID}}">{{$employee->FIO}}</option>
                    @endforeach
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add new expense</button>
            <a type="button" href="{{ route('expensesShow')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','.expense',function(){
                var expense_id=$(this).val();
                console.log(expense_id);
                var a=$('.sum').parent();
                console.log(a);
                var op="";
                $.ajax({
				type:'get',
				url:'{!!URL::to('findSum')!!}',
				data:{'id':expense_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("salary");
					console.log(data);

					// here price is coloumn name in products table data.coln name

					a.find('.sum').val(data.Sum);

				},
				error:function(){

				}
			});
            })
        });
    </script>
</body>
</html>