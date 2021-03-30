<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/update.css">
    <title>WishListUpdate</title>
</head>
<body>
    <head>
    </head>
    <div>
    <form action="{{route('wishlist.update')}}" method="post" class="form">
        <input type="text" name="WishId" id="WishId" value="{{$WishId}}"><br><br>
        <input type="submit" value="WishListUpdate">
    </form>
    </div>
    <footer>
    </footer>
</body>
</html>
