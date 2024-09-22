<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .card {
            width: 350px;
            height: 220px;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Card Header (Logo and Design) */
        .card-header {
            width: 100%;
            background-color: #007BFF;
            padding: 10px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
        }

        .card-header img {
            width: 50px;
        }

        /* Member Info Styling */
        .card-body {
            margin-top: 10px;
            text-align: center;
        }

        .card-body p {
            margin: 5px 0;
            font-size: 16px;
        }

        /* Modern Font Styling */
        .card-body h2 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #333;
        }

        .card-body strong {
            color: #007BFF;
        }

        /* QR Code Styling */
        .qr-code img {
            width: 80px;
            height: 80px;
            position: absolute;
            bottom: 15px;
            right: 15px;
        }
    </style>
    <title>Member Card</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <!-- Logo -->
            <img src="{{asset('/images/logo.png') }}" alt="Conference Card">
        </div>
        <div class="card-body">
            <!-- Card Title -->
            <h2>Member Card</h2>
            <!-- Member Info -->
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Member ID:</strong> {{ $user->member_id }}</p>
        </div>
        <!-- QR Code -->
        <div class="qr-code">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $user->member_id }}" alt="Sotvi">
        </div>
    </div>
</body>
</html>
