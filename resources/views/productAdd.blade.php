<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmployeeAdd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
        .hei {
            margin-left: 10%;
            margin-top: 6%;
            font-family: 'Poppins', sans-serif;
        }
        button {
            margin-right: 15px;
        }

        body{
            background-image: url('../blue.JPG');
        }
    </style>
    <div class="hei">
        <h2>Product Add</h2>
        <form action="{{ route('productAddSubmit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                <input name="name" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Unit</label>
                <select name="Unit" style="width:300px;" class="form-select" aria-label="Default select example">
                    <option disabled selected>Please select Unit</option>
                    @foreach($units as $unit)
                        <option value="{{$unit->ID}}">{{$unit->Unit}}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sum</label>
                <input name="Sum" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Amount</label>
                <input name="Amount" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-primary">Add new product</button>
            <a type="button" href="{{ route('productShow')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>