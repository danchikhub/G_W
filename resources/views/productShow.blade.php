<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
@include('include.header')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col"><h1>Product List</h1> </div>
            <div class="col align-self-center"><a href="{{ route('productAdd')}}">
                <button type="submit" class="btn btn-success">New Product</button>
            </a></div>
            
            
        </div>
        
        <div class="table-responsive">
   <table class="table">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Unit</th>
                <th scope="col">Sum</th>
                <th scope="col">Amount</th>
                <th scope="col">Product Cost Price</th>
                <th scopt="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->Product_name}}</th>
                <td>{{$product->Unit}}</td>
                <td>{{$product->Sum}}</td>
                <td>{{$product->Amount}}</td>
                <td>{{$product->ProductCostPrice}}</td>
                <td>
                <a href="{{route('productUpdate', $product->ID)}}">
                <button type="submit" class="btn btn-success">Update</button>
                </a>
                <a href="{{route('productDelete', $product->ID)}}">
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