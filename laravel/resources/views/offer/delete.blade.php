<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>deleteOffer</title>
</head>
<body>
    <header id="header">
        @include ('header')
    </header>
    <form action="{{route('offer.delete')}}" method="post">
        @csrf
        <input value = "23" type="text" name="idOffer" id="idOffer"><br>
        <input type="submit" value="deleteOffer">
    </form>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
