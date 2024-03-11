<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<body>
    <p>Hello {{ $user_name }},</p>

    <p>{{ $user_name }} has requested for a new account on the portal. Please verify the details shared and approve the request by clicking the link below:</p>

    <p><a href="{{ $request_link }}">Approve Request</a></p>

    <p>Thank you,</p>
    <p>Team TSF</p>
</body>
</html>
