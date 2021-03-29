<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PromotionAdd</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/promotionAdd.css" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
<header>
    @include ('header')
</header>
    <form action="{{route('promotion.add')}}" method="post" class="form">
        @csrf
        <label for="year">Year : </label><br/>
        <input type="text" name="year" id="year"><br>
        <label for="speciality">Speciality : </label><br/>
        <input type="text" name="speciality" id="speciality"><br>
        <label for="idCenter">Id center : </label><br/>
        <input type="text" name="idCenter" id="idCenter"><br>
        <input type="submit" value="PromotionAdd">
    </form>
<footer>
    @include('footer')
</footer>
</body>
</html>
