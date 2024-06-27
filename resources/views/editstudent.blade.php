<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 0.875em;
        }
        .form-container {
            max-width: 600px;
            margin: 30px auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

@include('include.nav')

<div class="container form-container">
    <h2>Edit Student</h2>
    <form action="{{ route('updateStudent', $student->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="studentname">Student Name:</label>
            <input type="text" class="form-control" id="studentname" name="studentname" value="{{ old('studentname', $student->studentname) }}">
            @error('studentname')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" class="form-control" id="age" name="age" value="{{ old('age', $student->age) }}">
            @error('age')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('students') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
