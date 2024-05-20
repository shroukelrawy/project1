<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

   @include('includes.navstudent')

<div class="container" style="margin-left:20px">
<h2>Edit Student</h2>

<form action="{{ route('updatestudent',[$student->id]) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
            <label for="studentName">Student Name</label><br>
            <input type="text" id="studentName" name="studentName" class="form-control" value="{{$student->studentName}}"><br>
            @error('studentName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group">
            <label for="age">Age</label><br>
            <input type="text" id="age" name="age" class="form-control" value="{{$student->age}}"><br>
            @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <br>
    <input type="submit" value="submit">
</form> 
</div>
</body>
</html>
