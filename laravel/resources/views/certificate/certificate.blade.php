<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Certificate of Attendance</h1>
    <p>This certifies that <strong>{{ $user->name }}</strong></p>
    <p>has successfully participated in the conference</p>
    <h2>{{ $conference->title }}</h2>
    <p>Date: {{ \Carbon\Carbon::parse($conference->date)->format('d F, Y') }}</p>
</body>
</html>
