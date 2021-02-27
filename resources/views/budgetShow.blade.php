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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap');
        body {
           font-family: 'Poppins',sans-serif;
        }
        div#hei {
            margin-top: 20px;
            text-align: center;
        }
        p#hei {
            text-align: center;
            margin-top: 100px;
        }
     </style>
@include('include.header')
    <div class="container">
        <div class="row justify-content-between">
            <div id="hei"><h1>Budget List</h1> </div>
        </div>

        <div class="table-responsive">
   <table class="table">

        <p id="hei" class="fs-1">Budget : @foreach($budgets as $budget)
            <span class="fs-1">{{$budget->Sum}} som
            </span>
        @endforeach</p>


   </table>
   </div>
    </div>
</body>
</html>