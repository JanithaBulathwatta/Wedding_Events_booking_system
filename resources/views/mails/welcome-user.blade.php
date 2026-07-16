<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Magul Gedara</title>
</head>
<body style="font-family: sans-serif; color: #333; line-height: 1.6;">
    <h2 style="color: #f59e0b;">Welcome {{ $user->name }}!</h2>
    @if($user->is_customer == 1)
        <p>Welcome to Ashtaka family. Now you can access our services very easily.</p>
    @else
        <p>Welcome to Ashtaka family. Now you can provide your services very easily.</p>
    @endif
    <p>Thank You,<br>Team Ashtaka</p>
</body>
</html>
