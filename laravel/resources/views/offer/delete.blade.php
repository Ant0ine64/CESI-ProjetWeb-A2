<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>deleteOffer</title>
</head>
<body style="font-family: Nunito;">
    <header id="header">
        @include ('header')
    </header>
    <form action="{{route('offer.delete')}}" method="post" class="form">
        Are you sure you want to delete offer :
        <input value = "{{$offerId}}" type="text" name="idOffer" id="idOffer" readonly><br>
        <input type="submit" value="deleteOffer">
    </form>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
