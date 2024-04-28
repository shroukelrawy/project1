<!DOCTYPE html>
<html>
<head>
    <title>Page 2</title>
</head>
<body>



@if(session('firstName') && session('lastName'))
  
  <p>First Name: {{ session('firstName') }}</p>
  <p>Last Name: {{ session('lastName') }}</p>
@endif

</body>
</html>
