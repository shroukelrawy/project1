<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new student</title>
</head>
<body>

<h2>New Student</h2>

<form action="{{ route('insertStudent') }}" method="post">
    @csrf
    <label for="studentName">Student Name</label><br>
    <input type="text" id="studentName" name="studentName" value=""><br>
    <label for="age">Age</label><br>
    <input type="number" id="age" name="age" value=""><br><br>
    <input type="submit" value="submit">
</form> 

</body>
</html>
