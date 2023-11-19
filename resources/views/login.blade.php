<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
</head>
<body>
    <form action="{{ route('auth.login') }}" method="post">
        @csrf
        <input type="email" name="email" id="email">
        @error("email")
            {{ $message }}
        @enderror
        <input type="password" name="password" id="password">
        @error("password")
            {{ $message }}
        @enderror

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
