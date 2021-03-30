<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WishListUpdate</title>
</head>
<body>
    <form action="{{route('wishlist.update')}}" method="post">
        <input type="text" name="WishId" id="WishId" value="{{$WishId}}"><br>
        <input type="submit" value="WishListUpdate">
    </form>
</body>
</html>
