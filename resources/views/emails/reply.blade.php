<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Message Received</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400,700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        blockquote {
            background-color: #f5f5f5;
            border-left: 4px solid #ccc;
            padding: 10px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .email-container p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Message Received</h1>

        <p>Dear {{ $originalMessage->name }},</p>

        <p>Thank you for your message. We are pleased to inform you that we have received it and will reply shortly.</p>

        <p>Your message:</p>
        <blockquote>{{ $originalMessage->message }}</blockquote>

        <p>Our reply:</p>
        <blockquote>{{ $reply }}</blockquote>

        <p>Thank you for contacting us!</p>

        <p>Best regards,</p>
        <p>MyINTI</p>
    </div>
</body>
</html>
