<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

   @include('includes.nav')

<div class="container" style="margin-left:20px">
<h2>new client</h2>

<form action="{{ route('insertClient') }}" method="post">
    @csrf
    <label for="clientName">Client Name</label><br>
    <input type="text" id="clientName" name="clientName" class="form-control"><br>
    <label for="phone">Phone</label><br>
    <input type="text" id="phone" name="phone" class="form-control"><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" class="form-control"><br>
    <label for="website">Website</label><br>
    <input type="text" id="website" name="website" class="form-control"><br><br>
    <input type="submit" value="submit">
</form> 
</div>
</body>
</html>
