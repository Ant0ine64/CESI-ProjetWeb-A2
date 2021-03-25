<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WishListUpdate</title>
</head>
<body>
    <form action="{{route('wishlist.update')}}" method="post">
        @csrf
        <input type="text" name="idOffer" id="idOffer"><br>
        <input type="submit" value="WishListUpdate">
    </form>
</body>
</html>
