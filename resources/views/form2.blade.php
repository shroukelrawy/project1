<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new client</title>
</head>
<body>

<h2>new client</h2>

<form action="{{ route('insertClient') }}" method="post">
    @csrf
    <label for="clientName">Client Name</label><br>
    <input type="text" id="clientName" name="clientName" value="Egypt Air"><br>
    <label for="phone">Phone</label><br>
    <input type="text" id="phone" name="phone" value="2222222"><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" value="EgyptAir@gmail.com"><br>
    <label for="website">Wwbsite</label><br>
    <input type="text" id="website" name="website" value="https://egyptair.com"><br><br>
    <input type="submit" value="submit">
</form> 

</body>
</html>
