<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
@include('includes.navstudent')

<div class="container" style="margin-left:20px">
<h2>New Student</h2>
<form action="{{ route('insertStudent') }}" method="post">
    @csrf
    <div class="form-group">
            <label for="studentName">Student Name</label>
            <input type="text" id="studentName" name="studentName" value="{{ old('studentName') }}" class="form-control">
            @error('studentName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="{{ old('age') }}" class="form-control">
            @error('age')
                <div class="text-danger">{{ $message }}</div>
            @enderror
    </div>
    
    <input type="submit" value="submit">
</form> 
</div>
</body>
</html>
