php
Copy code
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>
<body>
    <h2>You received a message from: {{ $data['name'] }}</h2>

    <p>
        <strong>Name:</strong> {{ $data['name'] }}
    </p>

    <p>
        <strong>Phone:</strong> {{ $data['phone'] }}
    </p>

    <p>
        <strong>Email:</strong> {{ $data['email'] }}
    </p>

    <p>
        <strong>Message:</strong> {{ $data['message'] }}
    </p>
</body>
</html>