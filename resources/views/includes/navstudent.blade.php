 <!--start navbar -->
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Students</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('addStudent') }}">Add</a></li>
      <li><a href="{{ route('students') }}">Students</a></li>
      <li><a href="{{route('trashstudent')}}">Trashed</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
<!--end navbar -->