<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- Start navigation -->
  @include('include.navs')
  <!-- End navigation -->

  <div class="container" style="margin-top: 20px;">
    <h2>Student Form</h2>

    <form action="{{ route('insertstudent') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="studentname">Student Name:</label>
        <input type="text" class="form-control" id="studentname" name="studentname" value="{{ old('studentname') }}">
        @error('studentname')
        <div class="alert alert-danger" style="margin-top: 10px;">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="age">Age:</label>
        <input type="text" class="form-control" id="age" name="age" value="{{ old('age') }}">
        @error('age')
        <div class="alert alert-danger" style="margin-top: 10px;">
          {{ $message }}
        </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
