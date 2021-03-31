<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/main.css">
    <title>WishListUpdate</title>
</head>
<body>
    <head>
    </head>
    <main>
    <form action="{{route('wishlist.update')}}" method="post" class="form">
        <input type="text" name="WishId" id="WishId" value="{{$WishId}}"><br><br>
        <input type="submit" value="WishListUpdate">
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>
