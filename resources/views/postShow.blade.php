<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
@include('include.header')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col"><h1>Post List</h1> </div>
            <div class="col align-self-center"><a href="{{ route('postAdd')}}">
                <button type="submit" class="btn btn-success">New Post</button>
            </a></div>
            
            
        </div>
        
        <div class="table-responsive">
   <table class="table">
        <thead>
            <tr>
                <th scope="col">Name Post</th>
                <th scopt="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->Post}}</th>
                <td>
                <a href="{{route('postUpdate', $post->ID)}}">
                <button type="submit" class="btn btn-success">Update</button>
                </a>
                <a href="{{route('postDelete', $post->ID)}}">
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