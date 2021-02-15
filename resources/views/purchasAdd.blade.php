<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PurchasAdd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Purchas Add</h2>
        <form action="{{ route('purchasAddSubmit' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Raw</label>
                <select name="Raw" style="width:300px;" class="form-select" aria-label="Default select example">
                    <option selected>Please select Raw</option>
                    @foreach($raws as $raw)
                        <option value="{{$raw->ID}}">{{$raw->Raw_name}}</option>
                    @endforeach
                    
                </select>
            </div>

            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Amount</label>
                <input name="Amount" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sum</label>
                <input name="Sum" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input name="Date" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
            <button type="submit" class="btn btn-primary">Add new purchas</button>
            <a href="{{ route('purchasShow')}}" class="btn btn-link">Back</a>
        </form>
    </div>
</body>
</html>