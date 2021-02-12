<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnitAdd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Unit Add</h2>
        <form action="{{ route('unitAddSubmit' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
            <button type="submit" class="btn btn-primary">Add new Unit</button>
            <a href="{{ route('unitShow')}}" class="btn btn-link">Back</a>
        </form>
    </div>
</body>
</html>