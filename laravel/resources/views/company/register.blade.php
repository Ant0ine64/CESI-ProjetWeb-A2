<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RegisterCompany</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/offerUpdate.css" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
<header>
    @include ('header')
</header>
    <form action="{{route('company.create')}}" method="post" class="form">
        @csrf
        <label for="name">Name : </label><br/>
        <input type="text" name="name" id="name"><br>
        <label for="address">Address : </label><br/>
        <input type="text" name="address" id="address"><br>
        <label for="activitySector">Activity sector : </label><br/>
        <input type="text" name="activitySector" id="activitySector"><br>
        <label for="internsNumber">Interns Number : </label><br/>
        <input type="text" name="internsNumber" id="internsNumber"><br>
        <input type="submit" value="RegisterCompany">
    </form>
<footer>
    @include('footer')
</footer>
</body>
</html>
