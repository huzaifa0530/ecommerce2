<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Freight Estimate Request</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f2f4f8;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .header {
            background: #16324a;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
        }

        .content {
            margin-top: 20px;
            font-size: 14px;
            line-height: 1.5;
        }

        .footer {
            background: #16324a;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 0 0 8px 8px;
            margin-top: 20px;
            font-size: 12px;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">Ink Well – Freight Estimate Request</div>

        <div class="content">
            <p>New freight estimate request received with the following details:</p>
            <p><strong>Item Name:</strong> {{ $data['item_name'] }}</p>
            <p><strong>Item Number:</strong> {{ $data['item_number'] }}</p>
            <p><span class="label">User Email:</span> {{ $data['user_email'] }}</p>
            <p><span class="label">Quantity:</span> {{ $data['quantity'] }}</p>
            <p><span class="label">Country:</span> {{ $data['country'] }}</p>
            <p><span class="label">State:</span> {{ $data['state'] }}</p>
            <p><span class="label">Zip Code:</span> {{ $data['zip'] }}</p>
            <p><span class="label">Residential:</span> {{ $data['residential'] ?? 'No' }}</p>
        </div>

        <div class="footer">
            Ink Well – Automated Notification
        </div>
    </div>
</body>

</html>