<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Clinets</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="{{ route('clientForm')}}">Add</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Clients <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('clients')}}">Clients Lists</a></li>
          <li><a href="{{ route('trashClient')}}">Trashed</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>