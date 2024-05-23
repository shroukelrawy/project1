<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show {{ $client->id }} {{ $client->clientName }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</head>
<body>
@include('includes.nav')
     <!-- <p><img src="{{ Storage::url($client->image) }}"  alt="{{ $client->clientName }}" style="width: 200px; height:200px;"></p> -->
     <p><img src="{{ asset('storage/' . $client->image) }}" alt="" style="width: 200px; height:200px;"></p>
    <hr>
    <h2><strong>Name: </strong>{{$client->clientName}}</h2>
    <hr>
    <h2><strong>Phone: </strong>{{$client->phone}}</h2>
    <hr>
    <h2><strong>Email: </strong>{{$client->email}}</h2>
    <hr>
    <h2><strong>Website: </strong>{{$client->website}}</h2>
    <hr>
</body>
</html>