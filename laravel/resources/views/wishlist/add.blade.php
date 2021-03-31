<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <title>WishListAdd</title>
</head>
<body style="font-family: Nunito;">
<header>
    @include ('header')
</header>
    <main>
    <form action="{{route('wishlist.add')}}" method="post" class="form">
        Confirmation :
        <input value="{{$offerId}}" type="text" name="idOffer" id="idOffer" readonly><br>
        <input type="submit" value="WishListAdd">
    </form>
    </main>
<footer>
    @include('footer')
</footer>
</body>
</html>
