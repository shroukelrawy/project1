<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form method="POST" action="{{ route('receiveform1') }}">
    @csrf
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="{{ $fname }}"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="{{ $lname }}"><br><br>
  <input type="submit" value="Submit">
</form> 



</body>
</html>
