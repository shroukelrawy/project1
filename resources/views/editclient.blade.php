<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 0.875em;
        }
        .form-container {
            max-width: 600px;
            margin: 30px auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

@include('include.nav')

<div class="container form-container">
    <h2>Edit Client</h2>
    <form action="{{ route('updateClient', $client->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="clientname">Client Name:</label>
            <input type="text" class="form-control" id="clientname" name="clientname" value="{{ old('clientname', $client->clientname) }}">
            @error('clientname')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}">
            @error('phone')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}">
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $client->website) }}">
            @error('website')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
    <label for="image">Image:</label>
    @if($client->image)
        <img src="{{ asset('assets/images/' . $client->image) }}" alt="Client Image" style="max-width: 200px; margin-bottom: 10px;">
    @endif
    <input type="file" id="image" name="image" class="form-control">
    @error('image')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
    @if($errors->has('image'))
        <!-- If there was an error, show the file name if it was uploaded -->
        @if(old('image') && is_object(old('image')) && old('image') instanceof \Illuminate\Http\UploadedFile)
            <div class="text-muted">Uploaded file: {{ old('image')->getClientOriginalName() }}</div>
        @endif
    @endif
</div>


        <div class="form-group">
            <label for="city">City:</label>
            <select name="city" id="city" class="form-control">
               <option value="">Please Select City</option>
               <option value="Cairo" {{ old('city', $client->city) == 'Cairo' ? 'selected' : '' }}>Cairo</option>
               <option value="Giza" {{ old('city', $client->city) == 'Giza' ? 'selected' : '' }}>Giza</option>
               <option value="Alex" {{ old('city', $client->city) == 'Alex' ? 'selected' : '' }}>Alex</option>
            </select>
            @error('city')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active" name="active" {{ old('active', $client->active) ? 'checked' : '' }}>
                <label class="form-check-label" for="active">Active</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('clients') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
