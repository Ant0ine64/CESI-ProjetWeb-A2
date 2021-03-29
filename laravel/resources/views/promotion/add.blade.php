<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PromotionAdd</title>
</head>
<body>
    <form action="{{route('promotion.add')}}" method="post">
        @csrf
        <input type="text" name="year" id="year"><br>
        <input type="text" name="speciality" id="speciality"><br>
        <input type="text" name="idCenter" id="idCenter"><br>
        <input type="submit" value="PromotionAdd">
    </form>
</body>
</html>
