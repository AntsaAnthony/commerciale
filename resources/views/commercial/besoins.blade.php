<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($besoins as $besoin)
        <div>
            <p>{{ $besoin->product->name }}</p>
            <p>Quantité : {{ $besoin->quantity }}</p>
            <hr>
        </div>
    @endforeach
</body>
</html>
