<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <title>Buy Conference</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .conference-card {
            width: 400px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .conference-card img {
            width: 100%;
            height: 200px;
            border-radius: 10px;
        }

        .conference-card h1 {
            margin-top: 15px;
            font-size: 24px;
            color: #333;
        }

        .conference-card p {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
        }

        .conference-card .price {
            font-size: 20px;
            font-weight: bold;
            color: #e74c3c;
        }

        .conference-card .member-price {
            font-size: 18px;
            font-weight: bold;
            color: #2ecc71;
        }

        #pay-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        #pay-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="conference-card">
        <h2>Anda akan melakukan pembelian conference berikut:</h2>
        <!-- Gambar conference -->
        <img src="{{ asset('storage/conference/' . $conference->image) }}" alt="Conference Image">

        <!-- Judul conference -->
        <h1>{{ $conference->title }}</h1>

        <!-- Harga berdasarkan jenis user -->
        @if (auth()->user()->role_id === 3)
            <p>Original Price: <span class="price">Rp{{ $conference->price }}</span></p>
            <p>Member Price: <span class="member-price">Rp{{ $conference ->price - ($conference->price * $conference->discount / 100) }}</span></p>
        @else
            <p>Price: <span class="price">Rp{{ $conference->price }}</span></p>
        @endif

        <!-- Tombol bayar -->
        <button id="pay-button">Pay Now</button>
    </div>
    <script>
        var userRole = "{{ Auth::user()->role_id }}";
    </script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            var snapToken = "{{ $snapToken }}"; // Ambil token dari Blade template

            // Trigger snap popup
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    if (result) {
                        alert("Payment success!");
                        console.log(result);
                        if (userRole == 2) { // 2 adalah role untuk user biasa
                            window.location.href = '/myconference';
                        } else if (userRole == 3) { // 3 adalah role untuk member
                            window.location.href = '/myconferences';
                        }
                    }
                },
                onPending: function(result) {
                    alert("waiting for your payment!");
                    console.log(result);
                    window.location.href = '/user';
                },
                onError: function(result) {
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>

</html>
