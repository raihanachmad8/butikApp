<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
</div>
    <!-- resources/views/auth/passwords/email.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>

    <form action="{{ route('password.email') }}" method="post">
        @csrf

        <div>
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <button type="submit">Send Password Reset Link</button>
        </div>
    </form>

</body>
</html>
