<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
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
        <div class="header">Ink Well – Contact Form Submission</div>

        <div class="content">
            <p>New contact form submission received with the following details:</p>
            <p><span class="label">First Name:</span> {{ $data['first_name'] }}</p>
            <p><span class="label">Last Name:</span> {{ $data['last_name'] }}</p>
            <p><span class="label">Email:</span> {{ $data['email'] }}</p>
            <p><span class="label">Phone:</span> {{ $data['phone'] ?? 'N/A' }}</p>
            <p><span class="label">Message:</span></p>
            <p>{{ $data['message'] }}</p>
        </div>

        <div class="footer">
            Ink Well – Automated Notification
        </div>
    </div>
</body>

</html>
