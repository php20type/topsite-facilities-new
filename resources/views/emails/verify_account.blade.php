<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>
    <p>Hello {{ $user_name }},</p>

    <p> Thank you for registering on our platform. Please click the button below to verify your email and activate your account:
</p>
   <p>click here : {{ $verification_link }}</p>

    <p>Thank you,</p>
    <p>Team TSF</p>
</body>

</html>