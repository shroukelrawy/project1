
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Contact US Form Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Contact US Form</h1>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <form action="{{ route('contactus.store') }}" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{ old('phone') }}">
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                <label for="message">Message:</label>
                <textarea name="message" class="form-control" placeholder="Enter Message">{{ old('message') }}</textarea>
                <span class="text-danger">{{ $errors->first('message') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Contact US!</button>
            </div>
        </form>
    </div>
</body>
</html>