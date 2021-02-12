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
        <form action="{{ route('employeeUpdateSubmit',$employees->ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field()}}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                
                <input value="{{$employees->FIO}}" name="FIO" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post</label>
                <select name="Post" style="width:300px;" class="form-select" aria-label="Default select example">
                    @foreach($employeeLists as $employeeList)
                    <option  value="{{$employeeList->ID}}" selected>--Selected {{$employeeList->Post}} --</option>
                    @endforeach
                    @foreach($posts as $post)
                        <option value="{{$post->ID}}">{{$post->Post}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Salary</label>
                
                <input value="{{$employees->Salary}}" name="Salary" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input value="{{$employees->Address}}" name="Address" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input value="{{$employees->Telephone}}" name="Phone" style="width:300px;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Update employee</button>
            <a href="{{ route('employeeShow')}}" class="btn btn-link">Back</a>
        </form>
    </div>
</body>
</html>