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

@include('include.nav')
<div class="container">
  <h2>Clients Data</h2>
  <!-- Display Success Message -->
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Website</th>
        <th>City</th>
        <th>Image</th>
        <th>Active</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($clients as $client)

      <tr>
        <td>{{$client->clientname}}</td>
        <td>{{$client->phone}}</td>
        <td>{{$client->email}}</td>
        <td>{{$client->website}}</td>
        <td>{{$client->city}}</td>
        <td><img src="{{ $client->getImagePath() }}" alt="Client Image" style="max-width: 100px;"></td>
        <td>{{ $client->getActiveStatus() }}</td>
        <td><a href="{{route('editClient',$client->id)}}">Edit</td>
        <td><a href="{{route('showClient',$client->id)}}">Show</td>
        <td>
        <form id="delete-form-{{$client->id}}" action="{{ route('deleteClient', $client->id) }}" method="POST" style="display: none;">
            <input type="hidden" value="{{$client->id}}" name="id">
          
            @csrf
             @method('DELETE')
        </form>
          <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this client? This action cannot be undone.')) { document.getElementById('delete-form-{{$client->id}}').submit(); }">
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
