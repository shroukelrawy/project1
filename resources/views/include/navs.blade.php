<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Students</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="{{ route('studentForm')}}">Add</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Students <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('students')}}">Students</a></li>
          <li><a href="{{ route('trashStudent')}}">Trashed</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
    <div class="navbar-form navbar-right">
            <div class="form-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search Students">
                <ul class="dropdown-menu" id="searchDropdown" style="display: none;"></ul>
            </div>
            <button type="button" class="btn btn-default" id="searchBtn">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</nav>
