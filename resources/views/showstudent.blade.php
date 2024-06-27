<?php
use Illuminate\Support\Facades\DB;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show <?php echo $student->studentname?></title>
</head>
<body>
   <h1><strong>Name:</strong><?php echo $student->studentname?></h1>
   <hr>
   <h2><strong>Age:</strong><?php echo $student->age?></h2>
   
  <a href="{{ route('students') }}"><input type='submit' value='Return'></a>

</body>
</html>