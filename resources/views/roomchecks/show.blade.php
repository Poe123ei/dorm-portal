
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Inspection Details</title>
</head>
<body>
    <h1>Room Inspection Details</h1>

    <p><strong>Room ID:</strong> {{ $roomCheck->room_id }}</p>
    <p><strong>Student ID:</strong> {{ $roomCheck->student_id }}</p>
    <p><strong>Student Name:</strong> {{ $roomCheck->student_name }}</p>

    <a href="{{ route('roomcheck.index') }}">Back to List</a>
</body>
</html>
