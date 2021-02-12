<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col"><h1>Employee List</h1> </div>
            <div class="col align-self-center"><a href="{{ route('employeeAdd')}}">
                <button type="submit" class="btn btn-success">New Employee</button>
            </a></div>
            
            
        </div>
        
        <div class="table-responsive">
   <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Post</th>
                <th scope="col">Salary</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scopt="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th scope="row">{{$employee->FIO}}</th>
                <td>{{$employee->Post}}</td>
                <td>{{$employee->Salary}}</td>
                <td>{{$employee->Address}}</td>
                <td>{{$employee->Telephone}}</td>
                <td>
                <a href="{{route('employeeUpdate', $employee->ID)}}">
                <button type="submit" class="btn btn-success">Update</button>
                </a>
                <a href="{{route('employeeDelete', $employee->ID)}}">
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