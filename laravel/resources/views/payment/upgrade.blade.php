<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <title>Upgrade to Member</title>
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

        .upgrade-card {
            width: 400px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .upgrade-card h1 {
            margin-top: 15px;
            font-size: 24px;
            color: #333;
        }

        .upgrade-card p {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
        }

        .upgrade-card .price {
            font-size: 20px;
            font-weight: bold;
            color: #e74c3c;
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
    <div class="upgrade-card">
        <h2>Upgrade ke Member</h2>
        <p>Harga Upgrade:</p>
        <p class="price">Rp{{ number_format($membershipPrice->price, 2, ',', '.') }}</p>
        <button id="pay-button">Pay Now</button>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            var snapToken = "{{ $snapToken }}";
            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    alert("Payment success!");
                    console.log(result);
                    window.location.href = '/upgrade/waiting';
                },
                onPending: function(result) {
                    alert("Waiting for your payment!");
                    console.log(result);
                    window.location.href = '/user';
                },
                onError: function(result) {
                    alert("Payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert('You closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>

</html>
