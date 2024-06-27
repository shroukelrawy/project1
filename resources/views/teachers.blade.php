<!DOCTYPE html>
<html lang="en">
<head>
  <title>Clients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>

<div class="container">
  <h2>Teachers Data</h2>
  <!-- Display Success Message -->
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Teacher Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>No Of Experience</th>
        <th>Job Title</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($teachers as $teacher)

      <tr>
        <td>{{$teacher->name}}</td>
        <td>{{$teacher->phone}}</td>
        <td>{{$teacher->email}}</td>
        <td>{{$teacher->no_of_experience}}</td>
        <td>{{$teacher->job_title}}</td>
        <td><a href="{{route('editTeacher',$teacher->id)}}">Edit</td>
        <td><a href="{{route('showTeacher',$teacher->id)}}">Show</td>
        <td>
        <form id="delete-form-{{$teacher->id}}" action="{{ route('deleteTeacher', $teacher->id) }}" method="POST" style="display: none;">
            <input type="hidden" value="{{$teacher->id}}" name="id">
          
            @csrf
             @method('DELETE')
        </form>
          <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete {{ $teacher->name }}? This action cannot be undone.')) { document.getElementById('delete-form-{{$teacher->id}}').submit(); }">
            Delete
          </a>
       </td>


      </tr>
       @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
