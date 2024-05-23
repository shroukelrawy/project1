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

@include('includes.nav')

<div class="container">
  <h2>Clients Data</h2>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Website</th>
        <th>City</th>
        <th>Active</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>


      </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
    
      <tr>
        <td>{{ $client->clientName }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->website }}</td>
        <td>{{ $client->city }}</td>

        <td>{{ $client->active ? 'Yes' : 'No' }}</td>
        <td>{{ $client->image }}</td>

        <td><a href="{{route('editclients',$client->id)}}">Edit</a></td>
        <td><a href="{{route('showclient',$client->id)}}">Show</a></td>
        <td>
         <form action="{{route('delclient')}}" method="post">
          @csrf
          @method('DELETE')
            <input type="hidden" value="{{$client->id}}" name="id">
            <input type="submit" value="Delete">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
