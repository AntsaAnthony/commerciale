<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
</head>
<body>
    @foreach($besoins as $besoin)
    <div>
        <p>service {{$besoin->service}}</p>
        <p>{{$besoin->produit}}</p>
        <p>quantite : {{$besoin->quantity}}</p>
        <a href="{{route('besoin.valider')}}?id={{$besoin->id}}"><button>valider</button></a>
        <br>
        <p>-----------</p>
    </div>
    @endforeach
</body>
</html>