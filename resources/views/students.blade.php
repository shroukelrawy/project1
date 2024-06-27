<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@include('include.navs')
<div class="container">
  <h2>Students Data</h2>
  <!-- Display Success Message -->
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
        <td>{{ $student->studentname }}</td>
        <td>{{ $student->age }}</td>
        <td><a href="{{ route('editStudent', $student->id) }}">Edit</a></td>
        <td><a href="{{ route('showStudent', $student->id) }}">Show</a></td>
        <td>
          <form id="delete-form-{{ $student->id }}" action="{{ route('deleteStudent', $student->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete {{ $student->studentname }}? This action cannot be undone.')) { document.getElementById('delete-form-{{ $student->id }}').submit(); }">Delete</a>
            <input type="hidden" value="{{ $student->id }}" name="id">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
