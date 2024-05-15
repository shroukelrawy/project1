<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

   @include('includes.nav')

<div class="container" style="margin-left:20px">
<h2>Edit client</h2>

<form action="{{ route('updateclients',[$client->id]) }}" method="post">
    @csrf
    @method('put')
    <label for="clientName">Client Name</label><br>
    <input type="text" id="clientName" name="clientName" class="form-control" value="{{$client->clientName}}"><br>
    <label for="phone">Phone</label><br>
    <input type="text" id="phone" name="phone" class="form-control" value="{{$client->phone}}"><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" class="form-control" value="{{$client->email}}"><br>
    <label for="website">Website</label><br>
    <input type="text" id="website" name="website" class="form-control" value="{{$client->website}}"><br><br>
    <input type="submit" value="submit">
</form> 
</div>
</body>
</html>
