<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductionUpdate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="..\css\styles.css">
</head>
<body>
    <div class="hei">
        <h2>Production Update</h2>
        <form action="{{ route('productionUpdateSubmit', $productions   ->ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product</label>
                <select name="Product" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($productionProducts as $productionProduct)
                    <option  value="{{$productionProduct->ID}}" selected>--Selected {{$productionProduct->Product_name}} --</option>
                    @endforeach
                    @foreach($products as $product)
                        <option value="{{$product->ID}}">{{$product->Product_name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Amount</label>
                <input value="{{$productions->Amount}}" name="Amount" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input  value="{{$productions->Data}}" name="Date" style="width:300px;" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Employee</label>
                <select name="Employee" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($productionEmployees as $productionEmployee)
                    <option  value="{{$productionEmployee->ID}}" selected>--Selected {{$productionEmployee->FIO}} --</option>
                    @endforeach
                    @foreach($employees as $employee)
                        <option value="{{$employee->ID}}">{{$employee->FIO}}</option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update production</button>
            <a type="button" href="{{ route('productionShow')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>