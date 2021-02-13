<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IngredientAdd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Ingredient Add</h2>
        <form action="{{ route('ingredientAddSubmit' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product</label>
                <select name="Product" style="width:300px;" class="form-select" aria-label="Default select example">
                    <option selected>Please select product</option>
                    @foreach($products as $product)
                        <option value="{{$product->ID}}">{{$product->Product_name}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Raw</label>
                <select name="Raw" style="width:300px;" class="form-select" aria-label="Default select example">
                    <option selected>Please select raw</option>
                    @foreach($raws as $raw)
                        <option value="{{$raw->ID}}">{{$raw->Raw_name}}</option>
                    @endforeach
                    
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Amount</label>
                <input name="Amount" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Add new employee</button>
            <a href="{{ route('ingredientShow')}}" class="btn btn-link">Back</a>
        </form>
    </div>
</body>
</html>