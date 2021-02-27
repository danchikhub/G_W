<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalaryAdd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="..\css\styles.css">
</head>
<body>
    <div class="hei">
        <h2>SalaryPayment Add</h2>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('salaryPaymentAddSubmit' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Salary</label>
                <select name="Employee" style="width:300px;" class="employee form-select" aria-label="Default select example">
                    <option disabled selected>Please select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{$employee->ID}}">{{$employee->FIO}}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Salary</label>
                <input name="Salary" style="width:300px;" type="text" class="salary form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bonus</label>
                <input name="Bonus" style="width:300px;" type="text" class="bonus form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input name="Date" style="width:300px;" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-primary">Add new Salary</button>
            <a type="button" href="{{ route('salaryPaymentShow')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','.employee',function(){
                var employee_id=$(this).val();
                console.log(employee_id);
                var a=$('.salary').parent();
                var b=$('.bonus').parent();
                console.log(a);
                var op="";
                $.ajax({
				type:'get',
				url:'{!!URL::to('findSalary')!!}',
				data:{'id':employee_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("salary");
					console.log(data);

					// here price is coloumn name in products table data.coln name

					a.find('.salary').val(data.Salary);

				},
				error:function(){

				}
			});
            $.ajax({
				type:'get',
				url:'{!!URL::to('findBonus')!!}',
				data:{'id':employee_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("salary");
					console.log(data);

					// here price is coloumn name in products table data.coln name

					b.find('.bonus').val(data.Bonus);

				},
				error:function(){

				}
			});
            })
        });
    </script>
</body>
</html>