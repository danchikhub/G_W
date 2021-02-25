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
        <form action="{{ route('ingredientUpdateSubmit',$ingredients->ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post</label>
                <select name="Product" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($ingredientProducts as $ingredientProduct)
                    <option  value="{{$ingredientProduct->ID}}" selected>--Selected {{$ingredientProduct->Product_name}} --</option>
                    @endforeach
                    @foreach($products as $product)
                        <option value="{{$product->ID}}">{{$product->Product_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post</label>
                <select name="Raw" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($ingredientRaws as $ingredientRaw)
                    <option  value="{{$ingredientRaw->ID}}" selected>--Selected {{$ingredientRaw->Raw_name}} --</option>
                    @endforeach
                    @foreach($raws as $raw)
                        <option value="{{$raw->ID}}">{{$raw->Raw_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Amount</label>
                <input value="{{$ingredients->Amount}}" name="Amount" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Update ingredient</button>
            <a href="{{ route('ingredientShow')}}" class="btn btn-link">Back</a>
        </form>
    </div>
</body>
</html>