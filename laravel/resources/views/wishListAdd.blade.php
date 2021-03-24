<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WishListAdd</title>
</head>
<body>
    <form action="{{route('wishlist.add')}}" method="post">
        @csrf
        <input type="text" name="idOffer" id="idOffer"><br>
        <input type="submit" value="WishListAdd">
    </form>
</body>
</html>
