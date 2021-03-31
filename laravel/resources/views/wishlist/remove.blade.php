<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <title>WishListRemove</title>
</head>
<body style="font-family: Nunito;">
<header>
    @include ('header')
</header>
    <form action="{{route('wishlist.remove')}}" method="post" class="form">
        Confirmation :
        <input value = "{{$offerId}}" type="text" name="idOffer" id="idOffer" readonly><br>
        <input type="submit" value="WishListRemove">
    </form>
<footer>
    @include('footer')
</footer>
</body>
</html>
