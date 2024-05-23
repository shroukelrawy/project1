<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

   @include('includes.nav')

<div class="container" style="margin-left:20px">
<h2>Edit client</h2>

<form action="{{ route('updateclients',[$client->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <div class="form-group">
    <label for="clientName">Client Name</label><br>
    <input type="text" id="clientName" name="clientName" class="form-control" value="{{$client->clientName}}"><br>
    @error('clientName')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label for="phone">Phone</label><br>
    <input type="text" id="phone" name="phone" class="form-control" value="{{$client->phone}}"><br>
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" class="form-control" value="{{$client->email}}"><br>
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label for="website">Website</label><br>
    <input type="text" id="website" name="website" class="form-control" value="{{$client->website}}"><br><br>
    @error('website')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  
    <div class="form-group">
            <label for="city">City:</label><br>
            <select name="city" id="city" class="form-control">
                <option value="">Please Select City</option>
                <option value="Cairo" {{ old('city', $client->city) == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                <option value="Giza" {{ old('city', $client->city) == 'Giza' ? 'selected' : '' }}>Giza</option>
                <option value="Alex" {{ old('city', $client->city) == 'Alex' ? 'selected' : '' }}>Alex</option>
            </select><br>
            @error('city')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="active">Active:</label>
            <input type="checkbox" id="active" name="active" {{ old('active', $client->active) ? 'checked' : '' }}><br>
        </div>

        <div class="form-group">
            <label for="image">Current Image:</label><br>
            <img src="{{ asset('storage/' . $client->image) }}" alt="Client Image" width="100"><br>
            <label for="image">New Image:</label><br>
            <input type="file" id="image" name="image" class="form-control"><br>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
  

    <input type="submit" class="btn btn-primary" value="submit">
</form> 
</div>
</body>
</html>
