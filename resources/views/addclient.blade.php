<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

   @include('includes.nav')

<div class="container" style="margin-left:20px">
<h2>new client</h2>

<form action="{{ route('insertClient') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="clientName">Client Name</label><br>
    <input type="text" id="clientName" name="clientName" class="form-control" value="{{old('clientName')}}"><br>
    @error('clientName')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label for="phone">Phone</label><br>
    <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone')}}"><br>
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}"><br>
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
    <label for="website">Website</label><br>
    <input type="text" id="website" name="website" class="form-control" value="{{old('website')}}"><br><br>
    @error('website')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>

    <div class="form-group">
            <label for="city">City:</label><br>
            <select name="city" id="city" class="form-control" required>
                <option value="">Please Select City</option>
                <option value="Cairo"{{ old('city') == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                <option value="Giza"{{ old('city') == 'Giza' ? 'selected' : '' }}>Giza</option>
                <option value="Alex"{{ old('city') == 'Alex' ? 'selected' : '' }}>Alex</option>
            </select><br>
            @error('city')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="active">Active:</label><br>
            <input type="checkbox" id="active" name="active" {{ old('active') ? 'checked' : '' }}><br>
        </div>

        <div class="form-group">
            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image" class="form-control"><br>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    <input type="submit" value="submit" class="btn btn-primary">
</form> 
</div>
</body>
</html>
