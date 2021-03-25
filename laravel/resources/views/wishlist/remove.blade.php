<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WishListRemove</title>
</head>
<body>
    <form action="{{route('wishlist.remove')}}" method="post">
        @csrf
        <input type="text" name="idOffer" id="idOffer"><br>
        <input type="submit" value="WishListRemove">
    </form>
</body>
</html>
