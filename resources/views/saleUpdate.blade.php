<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmployeeUpdate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="container">
        <h2>Employee Update</h2>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('saleUpdateSubmit',$salees->ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product</label>
                <select name="Product" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($saleProducts as $saleProduct)
                    <option  value="{{$saleProduct->ID}}" selected>--Selected {{$saleProduct->Product_name}} --</option>
                    @endforeach
                    @foreach($products as $product)
                        <option value="{{$product->ID}}">{{$product->Product_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Amount</label>
                <input value="{{$salees->Amount}}" name="Amount" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sum</label>
                <input value="{{$salees->Sum}}" name="Sum" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input value="{{$salees->Date}}" name="Date" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post</label>
                <select name="Employee" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($saleEmployees as $saleEmployee)
                    <option  value="{{$saleEmployee->ID}}" selected>--Selected {{$saleEmployee->FIO}} --</option>
                    @endforeach
                    @foreach($employees as $employee)
                        <option value="{{$employee->ID}}">{{$employee->FIO}}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update sale</button>
            <a href="{{ route('saleShow')}}" class="btn btn-link">Back</a>
        </form>
    </div>
</body>
</html>