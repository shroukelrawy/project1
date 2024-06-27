<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>

@include('include.navs')
<div class="container">
  <h2>Trashed</h2>
  <!-- Display Success Message -->
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student name</th>
        <th>Age</th>
        <th>restore</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($trashed as $student)

      <tr>
        <td>{{$student->studentname}}</td>
        <td>{{$student->age}}</td>
        <td><a href="{{route('restoreStudent',$student->id)}}">Restore</td>
        <td><a href="{{route('showStudent',$student->id)}}">Show</td>
        <td>
        <form action="{{ route('forceDeleteStudent') }}" method="POST">
             @csrf
             @method('DELETE')
            <input type="hidden" name="id" value="{{ $student->id }}">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to permanently delete this student?');">Force Delete</button>
          </form>
       </td>


      </tr>
       @endforeach
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
