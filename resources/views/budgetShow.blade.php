<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
@include('include.header')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col"><h1>Budget List</h1> </div>
            
            
            
        </div>
        
        <div class="table-responsive">
   <table class="table">
        
        <p class="fs-1">Budget: @foreach($budgets as $budget)
            <span class="fs-2">{{$budget->Sum}}</span>
        @endforeach</p>
        
        
   </table>
   </div>
    </div>
</body>
</html>