<!DOCTYPE html>
<html>

<head>
    <title>Verify your email address</title>
</head>

<body>
    <p>Dear {{ $user->name }},</p>
    <p>Thank you for signing up for our application! Please click the button below to verify your email address:</p>
    <a href="{{ route('verifiddmail', ['token' => $user->token]) }}">Verify Email Address</a>
</body>

</html>
