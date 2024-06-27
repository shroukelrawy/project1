<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show {{$teacher->name}}</title>
</head>
<body>
   
   
   <h1><strong>Client:</strong>{{$teacher->name}}</h1>
   <hr>
   <h2><strong>Phone:</strong>{{$teacher->phone}}</h2>
   <hr>
   <h2><strong>Email:</strong>{{$teacher->email}}</h2>
   <hr>
   <h2><strong>No Of Experience:</strong>{{$teacher->no_of_experience}}</h2>
   <hr>
   <a href="{{ route('teachers') }}"><input type='submit' value='Return'></a>
   
</body>
</html>