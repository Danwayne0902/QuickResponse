<!DOCTYPE html>
<html>
<head>
    <title>New Chat Message</title>
</head>
<body>
    <h1>New Chat Message from {{ $user->name }}</h1>
    <p>
        {{ $message->text }}
    </p>
</body>
</html>
