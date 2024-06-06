 <!--start navbar -->
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Clients</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('addClient') }}">Add</a></li>
      <li><a href="{{ route('clients') }}">clients</a></li>
      <li><a href="{{route('trashclient')}}">Trashed</a></li>
      @yield('menu')

       @stack('submenu')

      
    
  </ul>
  </div>
</nav>
<!--end navbar -->