<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@include('includes.navstudent')

<div class="container">
  <h2>Trashed Student</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Age</th>
        <th>Restore</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($trashed as $student)
    
      <tr>
        <td>{{ $student->studentName }}</td>
        <td>{{ $student->age }}</td>
        <td><a href="{{route('restorestudent',$student->id)}}">Restore</a></td>
        <td>
        <form action="{{route('forcedeletestudent')}}" method="post">

          @csrf
          @method('DELETE')
            <input type="hidden" value="{{$student->id}}" name="id">
            <!-- <button type="button" class="btn btn-danger" onclick="deleteStudent('{{ $student->id }}')"> Delete -->
            <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this student?')">
           <!-- </button> -->
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- <script>
  function deleteStudent(id) {
    if (confirm("Are you sure you want to delete this student?")) {
    
      document.getElementById('deleteForm' + id).submit();
    } else {
      console.log("Deletion canceled.");
    }
  }
</script> -->
</body>
</html>

